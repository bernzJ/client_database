<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectScope\BulkDestroyProjectScope;
use App\Http\Requests\Admin\ProjectScope\DestroyProjectScope;
use App\Http\Requests\Admin\ProjectScope\IndexProjectScope;
use App\Http\Requests\Admin\ProjectScope\StoreProjectScope;
use App\Http\Requests\Admin\ProjectScope\UpdateProjectScope;
use App\Models\ProjectScope;
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

class ProjectScopeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProjectScope $request
     * @return array|Factory|View
     */
    public function index(IndexProjectScope $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ProjectScope::class)->processRequestAndGet(
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

        return view('admin.project-scope.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.project-scope.create');

        return view('admin.project-scope.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProjectScope $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProjectScope $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ProjectScope
        $projectScope = ProjectScope::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/project-scopes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/project-scopes');
    }

    /**
     * Display the specified resource.
     *
     * @param ProjectScope $projectScope
     * @throws AuthorizationException
     * @return void
     */
    public function show(ProjectScope $projectScope)
    {
        $this->authorize('admin.project-scope.show', $projectScope);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProjectScope $projectScope
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ProjectScope $projectScope)
    {
        $this->authorize('admin.project-scope.edit', $projectScope);


        return view('admin.project-scope.edit', [
            'projectScope' => $projectScope,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProjectScope $request
     * @param ProjectScope $projectScope
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProjectScope $request, ProjectScope $projectScope)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ProjectScope
        $projectScope->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/project-scopes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/project-scopes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProjectScope $request
     * @param ProjectScope $projectScope
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProjectScope $request, ProjectScope $projectScope)
    {
        $projectScope->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProjectScope $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProjectScope $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ProjectScope::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
