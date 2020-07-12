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
use App\Models\Financial;
use App\Models\FiscalYear;
use App\Models\Industry;
use App\Models\ProjectType;
use App\Models\Timezone;
use App\Models\State;
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
            ['id', 'name', 'website', 'industry_id', 'timezone_id', 'fiscal_year_id', 'employees_count', 'project_type_id', 'client_type_id', 'active_projects', 'referenceable', 'opted_out', 'financial_id', 'hr_id', 'sso', 'test_site', 'refresh_date', 'logo', 'address_1', 'address_2', 'address_lng_lat', 'city', 'zip', 'country_id', 'state_id', 'lg_account_owner_oversight', 'lg_sales_owner', 'employee_groups_id', 'notes_id'],

            // set columns to searchIn
            ['id', 'name', 'website', 'logo', 'address_1', 'address_2', 'address_lng_lat', 'city', 'zip', 'lg_account_owner_oversight', 'lg_sales_owner'],

            function ($query) use ($request) {
                $query->with(['industry', 'timezone', 'projectType', 'clientType', 'country', 'state', 'concurProduct', 'fiscalYear']);
                if ($request->has('industries')) {
                    $query->whereIn('industry_id', $request->get('industries'));
                }
                if ($request->has('timezones')) {
                    $query->whereIn('timezone_id', $request->get('timezones'));
                }
                if ($request->has('project_types')) {
                    $query->whereIn('project_type_id', $request->get('project_types'));
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
            'client_types' => ClientType::all(),
            'countries' => Country::all(),
            'states' => State::all(),
            'concur_products' => ConcurProduct::all(),
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
            'client_types' => ClientType::all(),
            'countries' => Country::all(),
            'states' => State::all(),
            'concur_products' => ConcurProduct::all(),
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
        $sanitized['client_type_id'] = $request->getClientTypeId();
        $sanitized['country_id'] = $request->getCountryId();
        $sanitized['state_id'] = $request->getStateId();

        $fsSanitized = $request->getFiscalYearObject();
        $fiSanitized = $request->getFinancialObject();

        // Store the Customer
        $customer = Customer::create($sanitized);

        // Store concurproducts
        $ids = $request->getConcurProductIds();
        $customer->concurProduct()->attach($ids);

        // Store fiscal year
        $fiscalYear = FiscalYear::create($fsSanitized);
        $customer->fiscalYear()->associate($fiscalYear)->save();

        // Store financial
        $financial = Financial::create($fiSanitized);
        $customer->financial()->associate($financial);

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
            'client_types' => ClientType::all(),
            'countries' => Country::all(),
            'states' => State::all(),
            'concur_products' => ConcurProduct::all(),
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
        $sanitized['industry_id'] = $request->getIndustryId();
        $sanitized['timezone_id'] = $request->getTimezoneId();
        $sanitized['project_type_id'] = $request->getProjectTypeId();
        $sanitized['client_type_id'] = $request->getClientTypeId();
        $sanitized['country_id'] = $request->getCountryId();
        $sanitized['state_id'] = $request->getStateId();

        $fsSanitized = $request->getFiscalYearObject();
        $fiSanitized = $request->getFinancialObject();

        // Update changed values Customer
        $ids = $request->getConcurProductIds();
        $customer->concurProduct()->sync($ids);

        $customer->fiscalYear()->update($fsSanitized);
        $customer->financial()->associate($fiSanitized);

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
        $customer->fiscalYear()->delete();
        $customer->financial()->delete();
        $customer->concurProduct()->detach();
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
                    $customer->fiscalYear()->delete();
                    $customer->financial()->delete();
                    $customer->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
