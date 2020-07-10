<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Segment\BulkDestroySegment;
use App\Http\Requests\Admin\Segment\DestroySegment;
use App\Http\Requests\Admin\Segment\IndexSegment;
use App\Http\Requests\Admin\Segment\StoreSegment;
use App\Http\Requests\Admin\Segment\UpdateSegment;
use App\Models\Segment;
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

class SegmentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSegment $request
     * @return array|Factory|View
     */
    public function index(IndexSegment $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Segment::class)->processRequestAndGet(
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

        return view('admin.segment.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.segment.create');

        return view('admin.segment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSegment $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSegment $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Segment
        $segment = Segment::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/segments'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/segments');
    }

    /**
     * Display the specified resource.
     *
     * @param Segment $segment
     * @throws AuthorizationException
     * @return void
     */
    public function show(Segment $segment)
    {
        $this->authorize('admin.segment.show', $segment);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Segment $segment
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Segment $segment)
    {
        $this->authorize('admin.segment.edit', $segment);


        return view('admin.segment.edit', [
            'segment' => $segment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSegment $request
     * @param Segment $segment
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSegment $request, Segment $segment)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Segment
        $segment->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/segments'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/segments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySegment $request
     * @param Segment $segment
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySegment $request, Segment $segment)
    {
        $segment->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySegment $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySegment $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Segment::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
