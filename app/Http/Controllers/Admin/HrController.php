<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hr\BulkDestroyHr;
use App\Http\Requests\Admin\Hr\DestroyHr;
use App\Http\Requests\Admin\Hr\IndexHr;
use App\Http\Requests\Admin\Hr\StoreHr;
use App\Http\Requests\Admin\Hr\UpdateHr;
use App\Models\Hr;
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

class HrController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexHr $request
     * @return array|Factory|View
     */
    public function index(IndexHr $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Hr::class)->processRequestAndGet(
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

        return view('admin.hr.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.hr.create');

        return view('admin.hr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreHr $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreHr $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Hr
        $hr = Hr::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/hrs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/hrs');
    }

    /**
     * Display the specified resource.
     *
     * @param Hr $hr
     * @throws AuthorizationException
     * @return void
     */
    public function show(Hr $hr)
    {
        $this->authorize('admin.hr.show', $hr);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Hr $hr
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Hr $hr)
    {
        $this->authorize('admin.hr.edit', $hr);


        return view('admin.hr.edit', [
            'hr' => $hr,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateHr $request
     * @param Hr $hr
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateHr $request, Hr $hr)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Hr
        $hr->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/hrs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/hrs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyHr $request
     * @param Hr $hr
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyHr $request, Hr $hr)
    {
        $hr->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyHr $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyHr $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Hr::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
