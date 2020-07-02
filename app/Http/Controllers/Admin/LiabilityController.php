<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Liability\BulkDestroyLiability;
use App\Http\Requests\Admin\Liability\DestroyLiability;
use App\Http\Requests\Admin\Liability\IndexLiability;
use App\Http\Requests\Admin\Liability\StoreLiability;
use App\Http\Requests\Admin\Liability\UpdateLiability;
use App\Models\Liability;
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

class LiabilityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLiability $request
     * @return array|Factory|View
     */
    public function index(IndexLiability $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Liability::class)->processRequestAndGet(
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

        return view('admin.liability.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.liability.create');

        return view('admin.liability.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLiability $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLiability $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Liability
        $liability = Liability::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/liabilities'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/liabilities');
    }

    /**
     * Display the specified resource.
     *
     * @param Liability $liability
     * @throws AuthorizationException
     * @return void
     */
    public function show(Liability $liability)
    {
        $this->authorize('admin.liability.show', $liability);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Liability $liability
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Liability $liability)
    {
        $this->authorize('admin.liability.edit', $liability);


        return view('admin.liability.edit', [
            'liability' => $liability,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLiability $request
     * @param Liability $liability
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLiability $request, Liability $liability)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Liability
        $liability->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/liabilities'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/liabilities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLiability $request
     * @param Liability $liability
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLiability $request, Liability $liability)
    {
        $liability->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLiability $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLiability $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Liability::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
