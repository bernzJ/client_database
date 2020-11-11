<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Customer\BulkDestroyCustomer;
use App\Http\Requests\Admin\Customer\DestroyCustomer;
use App\Http\Requests\Admin\Customer\IndexCustomer;
use App\Http\Requests\Admin\Customer\StoreCustomer;
use App\Http\Requests\Admin\Customer\UpdateCustomer;
use App\Models\ClientType;
use App\Models\ConcurProduct;
use App\Models\Country;
use App\Models\Customer;
use App\Models\EmployeeGroup;
use App\Models\Financial;
use App\Models\FiscalYear;
use App\Models\Hr;
use App\Models\Industry;
use App\Models\ProjectScope;
use App\Models\ProjectType;
use App\Models\Timezone;
use App\Models\State;
use App\Models\Tmc;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Exports\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCustomer $request
     * @return array|Factory|View
     */
    public function index(IndexCustomer $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Customer::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'website', 'industry_id', 'timezone_id', 'fiscal_year_id', 'employees_count', 'project_type_id', 'project_scope_id', 'client_type_id', 'active_projects', 'referenceable', 'opted_out', 'financial_id', 'hr_id', 'sso', 'test_site', 'refresh_date', 'address_1', 'address_2', 'address_lng_lat', 'city', 'zip', 'country_id', 'state_id', 'lg_account_owner_oversight', 'lg_sales_owner', 'employee_group_id'],

            // set columns to searchIn
            ['id', 'name', 'website', 'address_1', 'address_2', 'address_lng_lat', 'city', 'zip', 'lg_account_owner_oversight', 'lg_sales_owner'],

            function ($query) use ($request) {
                //@NOTE: this might be redundant from model's protected.
                //$query->with(['industry', 'timezone', 'projectType', 'clientType', 'country', 'state', 'concurProduct', 'fiscalYear', 'hr']);
                if ($request->has('industries')) {
                    $query->whereIn('industry_id', $request->get('industries'));
                }
                if ($request->has('timezones')) {
                    $query->whereIn('timezone_id', $request->get('timezones'));
                }
                if ($request->has('project_types')) {
                    $query->whereIn('project_type_id', $request->get('project_types'));
                }
                if ($request->has('project_scopes')) {
                    $query->whereIn('project_scope_id', $request->get('project_scopes'));
                }
                if ($request->has('client_types')) {
                    $query->whereIn('client_type_id', $request->get('client_types'));
                }
                if ($request->has('countries')) {
                    $query->whereIn('country_id', $request->get('countries'));
                }
                if ($request->has('states')) {
                    $query->whereIn('state_id', $request->get('states'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.customer.index', [
            'data' => $data,
            'industries' => Industry::all(),
            'timezones' => Timezone::all(),
            'project_types' => ProjectType::all(),
            'project_scopes' => ProjectScope::all(),
            'client_types' => ClientType::all(),
            'countries' => Country::all(),
            'states' => State::all(),
            'concur_products' => ConcurProduct::all(),
            'tmcs' => Tmc::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.customer.create');

        return view('admin.customer.create',  [
            'industries' => Industry::all(),
            'timezones' => Timezone::all(),
            'project_types' => ProjectType::all(),
            'project_scopes' => ProjectScope::all(),
            'client_types' => ClientType::all(),
            'countries' => Country::all(),
            'states' => State::all(),
            'concur_products' => ConcurProduct::all(),
            'tmcs' => Tmc::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCustomer $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCustomer $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['industry_id'] = $request->getIndustryId();
        $sanitized['timezone_id'] = $request->getTimezoneId();
        $sanitized['project_type_id'] = $request->getProjectTypeId();
        $sanitized['project_scope_id'] = $request->getProjectScopeId();
        $sanitized['client_type_id'] = $request->getClientTypeId();
        $sanitized['country_id'] = $request->getCountryId();
        $sanitized['state_id'] = $request->getStateId();
        // $sanitized['address_lng_lat'] = $request->get('');

        $fsSanitized = $request->getFiscalYearObject();
        $fiSanitized = $request->getFinancialObject();
        $hrSanitized = $request->getHrObject();
        $egSanitized = $request->getEmployeeGroupObject();

        // Store the Customer
        $customer = Customer::create($sanitized);

        // Store concurproducts
        $concur_ids = $request->getConcurProductIds();
        if ($concur_ids) {
            $customer->concurProduct()->attach($concur_ids);
        }

        // Store fiscal year
        if ($fsSanitized) {
            $fiscalYear = FiscalYear::create($fsSanitized);
            $customer->fiscalYear()->associate($fiscalYear)->save();
        }

        // Store financial
        if ($fiSanitized) {
            $financial = Financial::create($fiSanitized);
            $customer->financial()->associate($financial)->save();
        }

        // Store hr
        if ($hrSanitized) {
            $hr = Hr::create($hrSanitized);
            $customer->hr()->associate($hr)->save();
        }

        // Store employee group
        if ($egSanitized) {
            $employeeGroup = EmployeeGroup::create($egSanitized);
            $customer->employeeGroup()->associate($employeeGroup)->save();
        }

        // Store tmcs
        $tmc_ids = $request->getTmcIds();
        if ($tmc_ids) {
            $customer->tmc()->attach($tmc_ids);
        }

        if ($request->ajax()) {
            return ['redirect' => url('admin/customers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @throws AuthorizationException
     * @return void
     */
    public function show(Customer $customer)
    {
        $this->authorize('admin.customer.show', $customer);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Customer $customer)
    {
        $this->authorize('admin.customer.edit', $customer);


        return view('admin.customer.edit', [
            'customer' => $customer,
            'industries' => Industry::all(),
            'timezones' => Timezone::all(),
            'project_types' => ProjectType::all(),
            'project_scopes' => ProjectScope::all(),
            'client_types' => ClientType::all(),
            'countries' => Country::all(),
            'states' => State::all(),
            'concur_products' => ConcurProduct::all(),
            'tmcs' => Tmc::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCustomer $request
     * @param Customer $customer
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCustomer $request, Customer $customer)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        //dd($sanitized);

        $sanitized['industry_id'] = $request->getIndustryId();
        $sanitized['timezone_id'] = $request->getTimezoneId();
        $sanitized['project_type_id'] = $request->getProjectTypeId();
        $sanitized['project_scope_id'] = $request->getProjectScopeId();
        $sanitized['client_type_id'] = $request->getClientTypeId();
        $sanitized['country_id'] = $request->getCountryId();
        $sanitized['state_id'] = $request->getStateId();

        $fsSanitized = $request->getFiscalYearObject();
        $fiSanitized = $request->getFinancialObject();
        $hrSanitized = $request->getHrObject();
        $egSanitized = $request->getEmployeeGroupObject();

        // Update changed values Customer
        $concur_ids = $request->getConcurProductIds();
        $customer->concurProduct()->sync($concur_ids);

        $tmc_ids = $request->getTmcIds();
        $customer->tmc()->sync($tmc_ids);

        if ($fsSanitized && $customer->fiscalYear()->update($fsSanitized) === 0) {
            $fiscalYear = FiscalYear::create($fsSanitized);
            $customer->fiscalYear()->associate($fiscalYear)->save();
        }
        if ($fiSanitized && $customer->financial()->update($fiSanitized) === 0) {
            $financial = Financial::create($fiSanitized);
            $customer->financial()->associate($financial)->save();
        }
        if ($hrSanitized && $customer->hr()->update($hrSanitized) === 0) {
            $hr = Hr::create($hrSanitized);
            $customer->hr()->associate($hr)->save();
        }
        if ($egSanitized && $customer->employeeGroup()->update($egSanitized) === 0) {
            $employeeGroup = EmployeeGroup::create($egSanitized);
            $customer->employeeGroup()->associate($employeeGroup)->save();
        }

        $customer->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/customers'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCustomer $request
     * @param Customer $customer
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCustomer $request, Customer $customer)
    {
        $customer->hr()->delete();
        $customer->fiscalYear()->delete();
        $customer->financial()->delete();
        $customer->employeeGroup()->delete();
        $customer->concurProduct()->detach();
        $customer->tmc()->detach();
        $customer->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCustomer $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCustomer $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    $customer = Customer::whereIn('id', $bulkChunk);
                    $customer->concurProduct()->detach();
                    $customer->tmc()->detach();
                    $customer->hr()->delete();
                    $customer->fiscalYear()->delete();
                    $customer->financial()->delete();
                    $customer->employeeGroup()->delete();
                    $customer->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    /**
     * Export entities
     *
     * @return BinaryFileResponse|null
     */
    public function export(): ?BinaryFileResponse
    {
        return Excel::download(app(CustomersExport::class), 'customers.xlsx');
    }
}
