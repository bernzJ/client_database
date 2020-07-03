<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Timezone\BulkDestroyTimezone;
use App\Http\Requests\Admin\Timezone\DestroyTimezone;
use App\Http\Requests\Admin\Timezone\IndexTimezone;
use App\Http\Requests\Admin\Timezone\StoreTimezone;
use App\Http\Requests\Admin\Timezone\UpdateTimezone;
use App\Models\Timezone;
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

class TimezonesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTimezone $request
     * @return array|Factory|View
     */
    public function index(IndexTimezone $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Timezone::class)->processRequestAndGet(
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

        return view('admin.timezone.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.timezone.create');

        return view('admin.timezone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTimezone $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTimezone $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Timezone
        $timezone = Timezone::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/timezones'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/timezones');
    }

    /**
     * Display the specified resource.
     *
     * @param Timezone $timezone
     * @throws AuthorizationException
     * @return void
     */
    public function show(Timezone $timezone)
    {
        $this->authorize('admin.timezone.show', $timezone);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Timezone $timezone
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Timezone $timezone)
    {
        $this->authorize('admin.timezone.edit', $timezone);


        return view('admin.timezone.edit', [
            'timezone' => $timezone,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTimezone $request
     * @param Timezone $timezone
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTimezone $request, Timezone $timezone)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Timezone
        $timezone->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/timezones'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/timezones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTimezone $request
     * @param Timezone $timezone
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTimezone $request, Timezone $timezone)
    {
        $timezone->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTimezone $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTimezone $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Timezone::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
