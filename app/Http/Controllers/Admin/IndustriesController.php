<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Industry\BulkDestroyIndustry;
use App\Http\Requests\Admin\Industry\DestroyIndustry;
use App\Http\Requests\Admin\Industry\IndexIndustry;
use App\Http\Requests\Admin\Industry\StoreIndustry;
use App\Http\Requests\Admin\Industry\UpdateIndustry;
use App\Models\Industry;
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

class IndustriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexIndustry $request
     * @return array|Factory|View
     */
    public function index(IndexIndustry $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Industry::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.industry.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.industry.create');

        return view('admin.industry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreIndustry $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreIndustry $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Industry
        $industry = Industry::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/industries'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/industries');
    }

    /**
     * Display the specified resource.
     *
     * @param Industry $industry
     * @throws AuthorizationException
     * @return void
     */
    public function show(Industry $industry)
    {
        $this->authorize('admin.industry.show', $industry);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Industry $industry
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Industry $industry)
    {
        $this->authorize('admin.industry.edit', $industry);


        return view('admin.industry.edit', [
            'industry' => $industry,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateIndustry $request
     * @param Industry $industry
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateIndustry $request, Industry $industry)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Industry
        $industry->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/industries'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/industries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyIndustry $request
     * @param Industry $industry
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyIndustry $request, Industry $industry)
    {
        $industry->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyIndustry $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyIndustry $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Industry::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
