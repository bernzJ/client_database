<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GlobalFootprintCountry\BulkDestroyGlobalFootprintCountry;
use App\Http\Requests\Admin\GlobalFootprintCountry\DestroyGlobalFootprintCountry;
use App\Http\Requests\Admin\GlobalFootprintCountry\IndexGlobalFootprintCountry;
use App\Http\Requests\Admin\GlobalFootprintCountry\StoreGlobalFootprintCountry;
use App\Http\Requests\Admin\GlobalFootprintCountry\UpdateGlobalFootprintCountry;
use App\Models\GlobalFootprintCountry;
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

class GlobalFootprintCountryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexGlobalFootprintCountry $request
     * @return array|Factory|View
     */
    public function index(IndexGlobalFootprintCountry $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(GlobalFootprintCountry::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'global_footprint_id', 'country_id'],

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

        return view('admin.global-footprint-country.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.global-footprint-country.create');

        return view('admin.global-footprint-country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGlobalFootprintCountry $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreGlobalFootprintCountry $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the GlobalFootprintCountry
        $globalFootprintCountry = GlobalFootprintCountry::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/global-footprint-countries'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/global-footprint-countries');
    }

    /**
     * Display the specified resource.
     *
     * @param GlobalFootprintCountry $globalFootprintCountry
     * @throws AuthorizationException
     * @return void
     */
    public function show(GlobalFootprintCountry $globalFootprintCountry)
    {
        $this->authorize('admin.global-footprint-country.show', $globalFootprintCountry);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param GlobalFootprintCountry $globalFootprintCountry
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(GlobalFootprintCountry $globalFootprintCountry)
    {
        $this->authorize('admin.global-footprint-country.edit', $globalFootprintCountry);


        return view('admin.global-footprint-country.edit', [
            'globalFootprintCountry' => $globalFootprintCountry,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGlobalFootprintCountry $request
     * @param GlobalFootprintCountry $globalFootprintCountry
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateGlobalFootprintCountry $request, GlobalFootprintCountry $globalFootprintCountry)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values GlobalFootprintCountry
        $globalFootprintCountry->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/global-footprint-countries'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/global-footprint-countries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyGlobalFootprintCountry $request
     * @param GlobalFootprintCountry $globalFootprintCountry
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyGlobalFootprintCountry $request, GlobalFootprintCountry $globalFootprintCountry)
    {
        $globalFootprintCountry->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyGlobalFootprintCountry $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyGlobalFootprintCountry $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    GlobalFootprintCountry::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
