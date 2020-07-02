<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Payroll\BulkDestroyPayroll;
use App\Http\Requests\Admin\Payroll\DestroyPayroll;
use App\Http\Requests\Admin\Payroll\IndexPayroll;
use App\Http\Requests\Admin\Payroll\StorePayroll;
use App\Http\Requests\Admin\Payroll\UpdatePayroll;
use App\Models\Payroll;
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

class PayrollController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPayroll $request
     * @return array|Factory|View
     */
    public function index(IndexPayroll $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Payroll::class)->processRequestAndGet(
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

        return view('admin.payroll.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.payroll.create');

        return view('admin.payroll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePayroll $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePayroll $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Payroll
        $payroll = Payroll::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/payrolls'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/payrolls');
    }

    /**
     * Display the specified resource.
     *
     * @param Payroll $payroll
     * @throws AuthorizationException
     * @return void
     */
    public function show(Payroll $payroll)
    {
        $this->authorize('admin.payroll.show', $payroll);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Payroll $payroll
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Payroll $payroll)
    {
        $this->authorize('admin.payroll.edit', $payroll);


        return view('admin.payroll.edit', [
            'payroll' => $payroll,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePayroll $request
     * @param Payroll $payroll
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePayroll $request, Payroll $payroll)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Payroll
        $payroll->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/payrolls'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/payrolls');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPayroll $request
     * @param Payroll $payroll
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPayroll $request, Payroll $payroll)
    {
        $payroll->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPayroll $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPayroll $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Payroll::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
