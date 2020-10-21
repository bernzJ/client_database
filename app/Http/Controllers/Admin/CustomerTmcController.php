<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerTmc\BulkDestroyCustomerTmc;
use App\Http\Requests\Admin\CustomerTmc\DestroyCustomerTmc;
use App\Http\Requests\Admin\CustomerTmc\IndexCustomerTmc;
use App\Http\Requests\Admin\CustomerTmc\StoreCustomerTmc;
use App\Http\Requests\Admin\CustomerTmc\UpdateCustomerTmc;
use App\Models\CustomerTmc;
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

class CustomerTmcController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCustomerTmc $request
     * @return array|Factory|View
     */
    public function index(IndexCustomerTmc $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CustomerTmc::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'tmc_id', 'customer_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.customer-tmc.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.customer-tmc.create');

        return view('admin.customer-tmc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCustomerTmc $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCustomerTmc $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CustomerTmc
        $customerTmc = CustomerTmc::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/customer-tmcs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/customer-tmcs');
    }

    /**
     * Display the specified resource.
     *
     * @param CustomerTmc $customerTmc
     * @throws AuthorizationException
     * @return void
     */
    public function show(CustomerTmc $customerTmc)
    {
        $this->authorize('admin.customer-tmc.show', $customerTmc);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CustomerTmc $customerTmc
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CustomerTmc $customerTmc)
    {
        $this->authorize('admin.customer-tmc.edit', $customerTmc);


        return view('admin.customer-tmc.edit', [
            'customerTmc' => $customerTmc,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCustomerTmc $request
     * @param CustomerTmc $customerTmc
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCustomerTmc $request, CustomerTmc $customerTmc)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CustomerTmc
        $customerTmc->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/customer-tmcs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/customer-tmcs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCustomerTmc $request
     * @param CustomerTmc $customerTmc
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCustomerTmc $request, CustomerTmc $customerTmc)
    {
        $customerTmc->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCustomerTmc $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCustomerTmc $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CustomerTmc::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
