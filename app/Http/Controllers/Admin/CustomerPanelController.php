<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerPanel\DestroyCustomerPanel;
use App\Http\Requests\Admin\CustomerPanel\IndexCustomerPanel;
use App\Http\Requests\Admin\CustomerPanel\StoreCustomerPanel;
use App\Http\Requests\Admin\CustomerPanel\UpdateCustomerPanel;
use App\Models\CustomerPanel;
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

class CustomerPanelController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCustomerPanel $request
     * @return array|Factory|View
     */
    public function index(IndexCustomerPanel $request)
    {
        $data = AdminListing::create(CustomerPanel::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'website', 'industry_id', 'timezone_id', 'fiscal_year_id', 'employees_count', 'project_type_id', 'project_scope_id', 'client_type_id', 'active_projects', 'referenceable', 'opted_out', 'financial_id', 'hr_id', 'sso', 'test_site', 'refresh_date', 'address_1', 'address_2', 'address_lng_lat', 'city', 'zip', 'country_id', 'state_id', 'lg_account_owner_oversight', 'lg_sales_owner', 'employee_group_id'],

            // set columns to searchIn
            ['id', 'name', 'website', 'address_1', 'address_2', 'address_lng_lat', 'city', 'zip', 'lg_account_owner_oversight', 'lg_sales_owner'],

            function ($query) use ($request) {
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

        return view('admin.customer-panel.index', [
            'data' => $data,
            'timezones' => Timezone::all(),
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
        $this->authorize('admin.customer-panel.create');

        return view('admin.customer-panel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCustomerPanel $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCustomerPanel $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        //@TODO: implement this.


        if ($request->ajax()) {
            return ['redirect' => url('admin/customer-panels'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/customer-panels');
    }
    //@TODO: remove this ?
    /**
     * Display the specified resource.
     *
     * @param CustomerPanel $customerPanel
     * @throws AuthorizationException
     * @return void
     */
    public function show(CustomerPanel $customerPanel)
    {
        $this->authorize('admin.customer-panel.show', $customerPanel);

        // TODO your code goes here
    }

    //@TODO: remove this.
    /**
     * Show the form for editing the specified resource.
     *
     * @param CustomerPanel $customerPanel
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CustomerPanel $customerPanel)
    {
        $this->authorize('admin.customer-panel.edit', $customerPanel);


        return view('admin.customer-panel.edit', [
            'customerPanel' => $customerPanel,
        ]);
    }

    //@TODO: remove this ?
    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCustomerPanel $request
     * @param CustomerPanel $customerPanel
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCustomerPanel $request, CustomerPanel $customerPanel)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CustomerPanel
        // $customerPanel->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/customer-panels'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/customer-panels');
    }

    //@TODO: remove this ?
    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCustomerPanel $request
     * @param CustomerPanel $customerPanel
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCustomerPanel $request, CustomerPanel $customerPanel)
    {
        $customerPanel->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }
}
