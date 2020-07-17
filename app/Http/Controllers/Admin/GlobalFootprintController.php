<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GlobalFootprint\BulkDestroyGlobalFootprint;
use App\Http\Requests\Admin\GlobalFootprint\DestroyGlobalFootprint;
use App\Http\Requests\Admin\GlobalFootprint\IndexGlobalFootprint;
use App\Http\Requests\Admin\GlobalFootprint\StoreGlobalFootprint;
use App\Http\Requests\Admin\GlobalFootprint\UpdateGlobalFootprint;
use App\Models\ConcurProduct;
use App\Models\Country;
use App\Models\GlobalFootprint;
use App\Models\Reimbursement;
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

class GlobalFootprintController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexGlobalFootprint $request
     * @return array|Factory|View
     */
    public function index(IndexGlobalFootprint $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(GlobalFootprint::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'reimbursement_id'],

            // set columns to searchIn
            ['id'],

            function ($query) use ($request) {
                if ($request->has('reimbursements')) {
                    $query->whereIn('reimbursement_id', $request->get('reimbursements'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.global-footprint.index', [
            'data' => $data,
            'reimbursements' => Reimbursement::all(),
            'countries' => Country::all(),
            'concur_products' => ConcurProduct::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.global-footprint.create');

        return view('admin.global-footprint.create', [
            'reimbursements' => Reimbursement::all(),
            'countries' => Country::all(),
            'concur_products' => ConcurProduct::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGlobalFootprint $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreGlobalFootprint $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['reimbursement_id'] = $request->getReimbursementId();
        // Store the GlobalFootprint
        $globalFootprint = GlobalFootprint::create($sanitized);

        // Store countries
        $country_ids = $request->getCountryIds();
        $globalFootprint->country()->attach($country_ids);

        // Store concurproducts
        $concur_ids = $request->getConcurProductIds();
        $globalFootprint->concurProduct()->attach($concur_ids);

        if ($request->ajax()) {
            return ['redirect' => url('admin/global-footprints'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/global-footprints');
    }

    /**
     * Display the specified resource.
     *
     * @param GlobalFootprint $globalFootprint
     * @throws AuthorizationException
     * @return void
     */
    public function show(GlobalFootprint $globalFootprint)
    {
        $this->authorize('admin.global-footprint.show', $globalFootprint);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param GlobalFootprint $globalFootprint
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(GlobalFootprint $globalFootprint)
    {
        $this->authorize('admin.global-footprint.edit', $globalFootprint);


        return view('admin.global-footprint.edit', [
            'globalFootprint' => $globalFootprint,
            'reimbursements' => Reimbursement::all(),
            'countries' => Country::all(),
            'concur_products' => ConcurProduct::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGlobalFootprint $request
     * @param GlobalFootprint $globalFootprint
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateGlobalFootprint $request, GlobalFootprint $globalFootprint)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['reimbursement_id'] = $request->getReimbursementId();
        // Update changed values GlobalFootprint
        $concur_ids = $request->getConcurProductIds();
        $globalFootprint->concurProduct()->sync($concur_ids);

        $country_ids = $request->getCountryIds();
        $globalFootprint->country()->sync($country_ids);

        $globalFootprint->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/global-footprints'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/global-footprints');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyGlobalFootprint $request
     * @param GlobalFootprint $globalFootprint
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyGlobalFootprint $request, GlobalFootprint $globalFootprint)
    {
        $globalFootprint->concurProduct()->detach();
        $globalFootprint->contry()->detach();
        $globalFootprint->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyGlobalFootprint $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyGlobalFootprint $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    $globalFootprint = GlobalFootprint::whereIn('id', $bulkChunk);
                    $globalFootprint->concurProduct()->detach();
                    $globalFootprint->contry()->detach();
                    $globalFootprint->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
