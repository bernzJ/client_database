<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClientType\BulkDestroyClientType;
use App\Http\Requests\Admin\ClientType\DestroyClientType;
use App\Http\Requests\Admin\ClientType\IndexClientType;
use App\Http\Requests\Admin\ClientType\StoreClientType;
use App\Http\Requests\Admin\ClientType\UpdateClientType;
use App\Models\ClientType;
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

class ClientTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexClientType $request
     * @return array|Factory|View
     */
    public function index(IndexClientType $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ClientType::class)->processRequestAndGet(
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

        return view('admin.client-type.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.client-type.create');

        return view('admin.client-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClientType $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreClientType $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ClientType
        $clientType = ClientType::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/client-types'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/client-types');
    }

    /**
     * Display the specified resource.
     *
     * @param ClientType $clientType
     * @throws AuthorizationException
     * @return void
     */
    public function show(ClientType $clientType)
    {
        $this->authorize('admin.client-type.show', $clientType);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ClientType $clientType
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ClientType $clientType)
    {
        $this->authorize('admin.client-type.edit', $clientType);


        return view('admin.client-type.edit', [
            'clientType' => $clientType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClientType $request
     * @param ClientType $clientType
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateClientType $request, ClientType $clientType)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ClientType
        $clientType->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/client-types'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/client-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyClientType $request
     * @param ClientType $clientType
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyClientType $request, ClientType $clientType)
    {
        $clientType->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyClientType $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyClientType $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ClientType::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
