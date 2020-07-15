<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tmc\BulkDestroyTmc;
use App\Http\Requests\Admin\Tmc\DestroyTmc;
use App\Http\Requests\Admin\Tmc\IndexTmc;
use App\Http\Requests\Admin\Tmc\StoreTmc;
use App\Http\Requests\Admin\Tmc\UpdateTmc;
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

class TmcController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTmc $request
     * @return array|Factory|View
     */
    public function index(IndexTmc $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Tmc::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'comment'],

            // set columns to searchIn
            ['id', 'name', 'comment']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tmc.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tmc.create');

        return view('admin.tmc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTmc $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTmc $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Tmc
        $tmc = Tmc::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tmcs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tmcs');
    }

    /**
     * Display the specified resource.
     *
     * @param Tmc $tmc
     * @throws AuthorizationException
     * @return void
     */
    public function show(Tmc $tmc)
    {
        $this->authorize('admin.tmc.show', $tmc);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tmc $tmc
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Tmc $tmc)
    {
        $this->authorize('admin.tmc.edit', $tmc);


        return view('admin.tmc.edit', [
            'tmc' => $tmc,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTmc $request
     * @param Tmc $tmc
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTmc $request, Tmc $tmc)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Tmc
        $tmc->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tmcs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tmcs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTmc $request
     * @param Tmc $tmc
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTmc $request, Tmc $tmc)
    {
        $tmc->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTmc $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTmc $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Tmc::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
