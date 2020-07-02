<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Frequency\BulkDestroyFrequency;
use App\Http\Requests\Admin\Frequency\DestroyFrequency;
use App\Http\Requests\Admin\Frequency\IndexFrequency;
use App\Http\Requests\Admin\Frequency\StoreFrequency;
use App\Http\Requests\Admin\Frequency\UpdateFrequency;
use App\Models\Frequency;
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

class FrequencyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFrequency $request
     * @return array|Factory|View
     */
    public function index(IndexFrequency $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Frequency::class)->processRequestAndGet(
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

        return view('admin.frequency.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.frequency.create');

        return view('admin.frequency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFrequency $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFrequency $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Frequency
        $frequency = Frequency::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/frequencies'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/frequencies');
    }

    /**
     * Display the specified resource.
     *
     * @param Frequency $frequency
     * @throws AuthorizationException
     * @return void
     */
    public function show(Frequency $frequency)
    {
        $this->authorize('admin.frequency.show', $frequency);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Frequency $frequency
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Frequency $frequency)
    {
        $this->authorize('admin.frequency.edit', $frequency);


        return view('admin.frequency.edit', [
            'frequency' => $frequency,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFrequency $request
     * @param Frequency $frequency
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFrequency $request, Frequency $frequency)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Frequency
        $frequency->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/frequencies'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/frequencies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFrequency $request
     * @param Frequency $frequency
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyFrequency $request, Frequency $frequency)
    {
        $frequency->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFrequency $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyFrequency $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Frequency::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
