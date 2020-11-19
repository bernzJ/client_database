<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConcurProductGlobalFootprint\BulkDestroyConcurProductGlobalFootprint;
use App\Http\Requests\Admin\ConcurProductGlobalFootprint\DestroyConcurProductGlobalFootprint;
use App\Http\Requests\Admin\ConcurProductGlobalFootprint\IndexConcurProductGlobalFootprint;
use App\Http\Requests\Admin\ConcurProductGlobalFootprint\StoreConcurProductGlobalFootprint;
use App\Http\Requests\Admin\ConcurProductGlobalFootprint\UpdateConcurProductGlobalFootprint;
use App\Models\ConcurProductGlobalFootprint;
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

class ConcurProductGlobalFootprintController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexConcurProductGlobalFootprint $request
     * @return array|Factory|View
     */
    public function index(IndexConcurProductGlobalFootprint $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ConcurProductGlobalFootprint::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'global_footprint_id', 'concur_product_id'],

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

        return view('admin.concur-product-global-footprint.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.concur-product-global-footprint.create');

        return view('admin.concur-product-global-footprint.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreConcurProductGlobalFootprint $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreConcurProductGlobalFootprint $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ConcurProductGlobalFootprint
        $concurProductGlobalFootprint = ConcurProductGlobalFootprint::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/concur-product-global-footprints'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/concur-product-global-footprints');
    }

    /**
     * Display the specified resource.
     *
     * @param ConcurProductGlobalFootprint $concurProductGlobalFootprint
     * @throws AuthorizationException
     * @return void
     */
    public function show(ConcurProductGlobalFootprint $concurProductGlobalFootprint)
    {
        $this->authorize('admin.concur-product-global-footprint.show', $concurProductGlobalFootprint);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ConcurProductGlobalFootprint $concurProductGlobalFootprint
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ConcurProductGlobalFootprint $concurProductGlobalFootprint)
    {
        $this->authorize('admin.concur-product-global-footprint.edit', $concurProductGlobalFootprint);


        return view('admin.concur-product-global-footprint.edit', [
            'concurProductGlobalFootprint' => $concurProductGlobalFootprint,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateConcurProductGlobalFootprint $request
     * @param ConcurProductGlobalFootprint $concurProductGlobalFootprint
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateConcurProductGlobalFootprint $request, ConcurProductGlobalFootprint $concurProductGlobalFootprint)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ConcurProductGlobalFootprint
        $concurProductGlobalFootprint->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/concur-product-global-footprints'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/concur-product-global-footprints');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyConcurProductGlobalFootprint $request
     * @param ConcurProductGlobalFootprint $concurProductGlobalFootprint
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyConcurProductGlobalFootprint $request, ConcurProductGlobalFootprint $concurProductGlobalFootprint)
    {
        $concurProductGlobalFootprint->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyConcurProductGlobalFootprint $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyConcurProductGlobalFootprint $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ConcurProductGlobalFootprint::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
