<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConcurProduct\BulkDestroyConcurProduct;
use App\Http\Requests\Admin\ConcurProduct\DestroyConcurProduct;
use App\Http\Requests\Admin\ConcurProduct\IndexConcurProduct;
use App\Http\Requests\Admin\ConcurProduct\StoreConcurProduct;
use App\Http\Requests\Admin\ConcurProduct\UpdateConcurProduct;
use App\Models\ConcurProduct;
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

class ConcurProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexConcurProduct $request
     * @return array|Factory|View
     */
    public function index(IndexConcurProduct $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ConcurProduct::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'product', 'segment_id'],

            // set columns to searchIn
            ['id', 'product']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.concur-product.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.concur-product.create');

        return view('admin.concur-product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreConcurProduct $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreConcurProduct $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ConcurProduct
        $concurProduct = ConcurProduct::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/concur-products'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/concur-products');
    }

    /**
     * Display the specified resource.
     *
     * @param ConcurProduct $concurProduct
     * @throws AuthorizationException
     * @return void
     */
    public function show(ConcurProduct $concurProduct)
    {
        $this->authorize('admin.concur-product.show', $concurProduct);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ConcurProduct $concurProduct
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ConcurProduct $concurProduct)
    {
        $this->authorize('admin.concur-product.edit', $concurProduct);


        return view('admin.concur-product.edit', [
            'concurProduct' => $concurProduct,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateConcurProduct $request
     * @param ConcurProduct $concurProduct
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateConcurProduct $request, ConcurProduct $concurProduct)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ConcurProduct
        $concurProduct->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/concur-products'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/concur-products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyConcurProduct $request
     * @param ConcurProduct $concurProduct
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyConcurProduct $request, ConcurProduct $concurProduct)
    {
        $concurProduct->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyConcurProduct $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyConcurProduct $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ConcurProduct::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
