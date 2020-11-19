<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountryGlobalFootprint\BulkDestroyCountryGlobalFootprint;
use App\Http\Requests\Admin\CountryGlobalFootprint\DestroyCountryGlobalFootprint;
use App\Http\Requests\Admin\CountryGlobalFootprint\IndexCountryGlobalFootprint;
use App\Http\Requests\Admin\CountryGlobalFootprint\StoreCountryGlobalFootprint;
use App\Http\Requests\Admin\CountryGlobalFootprint\UpdateCountryGlobalFootprint;
use App\Models\CountryGlobalFootprint;
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

class CountryGlobalFootprintController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCountryGlobalFootprint $request
     * @return array|Factory|View
     */
    public function index(IndexCountryGlobalFootprint $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CountryGlobalFootprint::class)->processRequestAndGet(
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

        return view('admin.country-global-footprint.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.country-global-footprint.create');

        return view('admin.country-global-footprint.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCountryGlobalFootprint $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCountryGlobalFootprint $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CountryGlobalFootprint
        $countryGlobalFootprint = CountryGlobalFootprint::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/country-global-footprints'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/country-global-footprints');
    }

    /**
     * Display the specified resource.
     *
     * @param CountryGlobalFootprint $countryGlobalFootprint
     * @throws AuthorizationException
     * @return void
     */
    public function show(CountryGlobalFootprint $countryGlobalFootprint)
    {
        $this->authorize('admin.country-global-footprint.show', $countryGlobalFootprint);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CountryGlobalFootprint $countryGlobalFootprint
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CountryGlobalFootprint $countryGlobalFootprint)
    {
        $this->authorize('admin.country-global-footprint.edit', $countryGlobalFootprint);


        return view('admin.country-global-footprint.edit', [
            'countryGlobalFootprint' => $countryGlobalFootprint,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCountryGlobalFootprint $request
     * @param CountryGlobalFootprint $countryGlobalFootprint
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCountryGlobalFootprint $request, CountryGlobalFootprint $countryGlobalFootprint)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CountryGlobalFootprint
        $countryGlobalFootprint->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/country-global-footprints'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/country-global-footprints');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCountryGlobalFootprint $request
     * @param CountryGlobalFootprint $countryGlobalFootprint
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCountryGlobalFootprint $request, CountryGlobalFootprint $countryGlobalFootprint)
    {
        $countryGlobalFootprint->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCountryGlobalFootprint $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCountryGlobalFootprint $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CountryGlobalFootprint::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
