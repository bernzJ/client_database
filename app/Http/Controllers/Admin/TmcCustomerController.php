<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TmcCustomer\BulkDestroyTmcCustomer;
use App\Http\Requests\Admin\TmcCustomer\DestroyTmcCustomer;
use App\Http\Requests\Admin\TmcCustomer\IndexTmcCustomer;
use App\Http\Requests\Admin\TmcCustomer\StoreTmcCustomer;
use App\Http\Requests\Admin\TmcCustomer\UpdateTmcCustomer;
use App\Models\TmcCustomer;
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

class TmcCustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTmcCustomer $request
     * @return array|Factory|View
     */
    public function index(IndexTmcCustomer $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TmcCustomer::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            [''],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tmc-customer.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tmc-customer.create');

        return view('admin.tmc-customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTmcCustomer $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTmcCustomer $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TmcCustomer
        $tmcCustomer = TmcCustomer::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tmc-customers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tmc-customers');
    }

    /**
     * Display the specified resource.
     *
     * @param TmcCustomer $tmcCustomer
     * @throws AuthorizationException
     * @return void
     */
    public function show(TmcCustomer $tmcCustomer)
    {
        $this->authorize('admin.tmc-customer.show', $tmcCustomer);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TmcCustomer $tmcCustomer
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TmcCustomer $tmcCustomer)
    {
        $this->authorize('admin.tmc-customer.edit', $tmcCustomer);


        return view('admin.tmc-customer.edit', [
            'tmcCustomer' => $tmcCustomer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTmcCustomer $request
     * @param TmcCustomer $tmcCustomer
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTmcCustomer $request, TmcCustomer $tmcCustomer)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TmcCustomer
        $tmcCustomer->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tmc-customers'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tmc-customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTmcCustomer $request
     * @param TmcCustomer $tmcCustomer
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTmcCustomer $request, TmcCustomer $tmcCustomer)
    {
        $tmcCustomer->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTmcCustomer $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTmcCustomer $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TmcCustomer::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
