<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConcurProductCustomer\BulkDestroyConcurProductCustomer;
use App\Http\Requests\Admin\ConcurProductCustomer\DestroyConcurProductCustomer;
use App\Http\Requests\Admin\ConcurProductCustomer\IndexConcurProductCustomer;
use App\Http\Requests\Admin\ConcurProductCustomer\StoreConcurProductCustomer;
use App\Http\Requests\Admin\ConcurProductCustomer\UpdateConcurProductCustomer;
use App\Models\ConcurProductCustomer;
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

class ConcurProductCustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexConcurProductCustomer $request
     * @return array|Factory|View
     */
    public function index(IndexConcurProductCustomer $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ConcurProductCustomer::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'concur_product_id', 'customer_id'],

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

        return view('admin.concur-product-customer.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.concur-product-customer.create');

        return view('admin.concur-product-customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreConcurProductCustomer $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreConcurProductCustomer $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ConcurProductCustomer
        $concurProductCustomer = ConcurProductCustomer::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/concur-product-customers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/concur-product-customers');
    }

    /**
     * Display the specified resource.
     *
     * @param ConcurProductCustomer $concurProductCustomer
     * @throws AuthorizationException
     * @return void
     */
    public function show(ConcurProductCustomer $concurProductCustomer)
    {
        $this->authorize('admin.concur-product-customer.show', $concurProductCustomer);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ConcurProductCustomer $concurProductCustomer
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ConcurProductCustomer $concurProductCustomer)
    {
        $this->authorize('admin.concur-product-customer.edit', $concurProductCustomer);


        return view('admin.concur-product-customer.edit', [
            'concurProductCustomer' => $concurProductCustomer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateConcurProductCustomer $request
     * @param ConcurProductCustomer $concurProductCustomer
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateConcurProductCustomer $request, ConcurProductCustomer $concurProductCustomer)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ConcurProductCustomer
        $concurProductCustomer->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/concur-product-customers'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/concur-product-customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyConcurProductCustomer $request
     * @param ConcurProductCustomer $concurProductCustomer
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyConcurProductCustomer $request, ConcurProductCustomer $concurProductCustomer)
    {
        $concurProductCustomer->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyConcurProductCustomer $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyConcurProductCustomer $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ConcurProductCustomer::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
