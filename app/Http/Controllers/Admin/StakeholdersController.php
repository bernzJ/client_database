<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stakeholder\BulkDestroyStakeholder;
use App\Http\Requests\Admin\Stakeholder\DestroyStakeholder;
use App\Http\Requests\Admin\Stakeholder\IndexStakeholder;
use App\Http\Requests\Admin\Stakeholder\StoreStakeholder;
use App\Http\Requests\Admin\Stakeholder\UpdateStakeholder;
use App\Models\ContactMethod;
use App\Models\Timezone;
use App\Models\Customer;
use App\Models\Stakeholder;
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

class StakeholdersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexStakeholder $request
     * @return array|Factory|View
     */
    public function index(IndexStakeholder $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Stakeholder::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'role', 'name', 'email', 'phone', 'contact_method_id', 'timezone_id', 'customer_id'],

            // set columns to searchIn
            ['id', 'role', 'name', 'email', 'phone'],

            function ($query)  use ($request) {
                if ($request->has('customers')) {
                    $query->whereIn('customer_id', $request->get('customers'));
                }
                if ($request->has('timezones')) {
                    $query->whereIn('timezone_id', $request->get('timezones'));
                }
                if ($request->has('contact_methods')) {
                    $query->whereIn('contact_method_id', $request->get('contact_methods'));
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

        return view('admin.stakeholder.index', [
            'data' => $data,
            'customers' => Customer::all(),
            'timezones' => Timezone::all(),
            'contact_methods' => ContactMethod::all(),
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
        $this->authorize('admin.stakeholder.create');

        return view('admin.stakeholder.create', [
            'customers' => Customer::all(),
            'timezones' => Timezone::all(),
            'contact_methods' => ContactMethod::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStakeholder $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreStakeholder $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['customer_id'] = $request->getCustomerId();
        $sanitized['timezone_id'] = $request->getTimezoneId();
        $sanitized['contact_method_id'] = $request->getContactMethodId();
        // Store the Stakeholder
        $stakeholder = Stakeholder::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/stakeholders'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/stakeholders');
    }

    /**
     * Display the specified resource.
     *
     * @param Stakeholder $stakeholder
     * @throws AuthorizationException
     * @return void
     */
    public function show(Stakeholder $stakeholder)
    {
        $this->authorize('admin.stakeholder.show', $stakeholder);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Stakeholder $stakeholder
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Stakeholder $stakeholder)
    {
        $this->authorize('admin.stakeholder.edit', $stakeholder);


        return view('admin.stakeholder.edit', [
            'stakeholder' => $stakeholder,
            'customers' => Customer::all(),
            'timezones' => Timezone::all(),
            'contact_methods' => ContactMethod::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStakeholder $request
     * @param Stakeholder $stakeholder
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateStakeholder $request, Stakeholder $stakeholder)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['customer_id'] = $request->getCustomerId();
        $sanitized['timezone_id'] = $request->getTimezoneId();
        $sanitized['contact_method_id'] = $request->getContactMethodId();
        // Update changed values Stakeholder
        $stakeholder->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/stakeholders'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/stakeholders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyStakeholder $request
     * @param Stakeholder $stakeholder
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyStakeholder $request, Stakeholder $stakeholder)
    {
        $stakeholder->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyStakeholder $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyStakeholder $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Stakeholder::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
