<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Financial\BulkDestroyFinancial;
use App\Http\Requests\Admin\Financial\DestroyFinancial;
use App\Http\Requests\Admin\Financial\IndexFinancial;
use App\Http\Requests\Admin\Financial\StoreFinancial;
use App\Http\Requests\Admin\Financial\UpdateFinancial;
use App\Models\Financial;
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

class FinancialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFinancial $request
     * @return array|Factory|View
     */
    public function index(IndexFinancial $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Financial::class)->processRequestAndGet(
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

        return view('admin.financial.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.financial.create');

        return view('admin.financial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFinancial $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFinancial $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Financial
        $financial = Financial::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/financials'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/financials');
    }

    /**
     * Display the specified resource.
     *
     * @param Financial $financial
     * @throws AuthorizationException
     * @return void
     */
    public function show(Financial $financial)
    {
        $this->authorize('admin.financial.show', $financial);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Financial $financial
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Financial $financial)
    {
        $this->authorize('admin.financial.edit', $financial);


        return view('admin.financial.edit', [
            'financial' => $financial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFinancial $request
     * @param Financial $financial
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFinancial $request, Financial $financial)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Financial
        $financial->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/financials'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/financials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFinancial $request
     * @param Financial $financial
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyFinancial $request, Financial $financial)
    {
        $financial->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFinancial $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyFinancial $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Financial::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
