<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployeeGroup\BulkDestroyEmployeeGroup;
use App\Http\Requests\Admin\EmployeeGroup\DestroyEmployeeGroup;
use App\Http\Requests\Admin\EmployeeGroup\IndexEmployeeGroup;
use App\Http\Requests\Admin\EmployeeGroup\StoreEmployeeGroup;
use App\Http\Requests\Admin\EmployeeGroup\UpdateEmployeeGroup;
use App\Models\EmployeeGroup;
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

class EmployeeGroupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEmployeeGroup $request
     * @return array|Factory|View
     */
    public function index(IndexEmployeeGroup $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(EmployeeGroup::class)->processRequestAndGet(
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

        return view('admin.employee-group.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.employee-group.create');

        return view('admin.employee-group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEmployeeGroup $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEmployeeGroup $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the EmployeeGroup
        $employeeGroup = EmployeeGroup::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/employee-groups'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/employee-groups');
    }

    /**
     * Display the specified resource.
     *
     * @param EmployeeGroup $employeeGroup
     * @throws AuthorizationException
     * @return void
     */
    public function show(EmployeeGroup $employeeGroup)
    {
        $this->authorize('admin.employee-group.show', $employeeGroup);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EmployeeGroup $employeeGroup
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(EmployeeGroup $employeeGroup)
    {
        $this->authorize('admin.employee-group.edit', $employeeGroup);


        return view('admin.employee-group.edit', [
            'employeeGroup' => $employeeGroup,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEmployeeGroup $request
     * @param EmployeeGroup $employeeGroup
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEmployeeGroup $request, EmployeeGroup $employeeGroup)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values EmployeeGroup
        $employeeGroup->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/employee-groups'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/employee-groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEmployeeGroup $request
     * @param EmployeeGroup $employeeGroup
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEmployeeGroup $request, EmployeeGroup $employeeGroup)
    {
        $employeeGroup->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEmployeeGroup $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEmployeeGroup $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    EmployeeGroup::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
