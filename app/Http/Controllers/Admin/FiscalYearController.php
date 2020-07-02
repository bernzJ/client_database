<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FiscalYear\BulkDestroyFiscalYear;
use App\Http\Requests\Admin\FiscalYear\DestroyFiscalYear;
use App\Http\Requests\Admin\FiscalYear\IndexFiscalYear;
use App\Http\Requests\Admin\FiscalYear\StoreFiscalYear;
use App\Http\Requests\Admin\FiscalYear\UpdateFiscalYear;
use App\Models\FiscalYear;
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

class FiscalYearController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFiscalYear $request
     * @return array|Factory|View
     */
    public function index(IndexFiscalYear $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(FiscalYear::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'begin', 'end', 'month_end_close_period', 'quarterly_close_cycle'],

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

        return view('admin.fiscal-year.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.fiscal-year.create');

        return view('admin.fiscal-year.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFiscalYear $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFiscalYear $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the FiscalYear
        $fiscalYear = FiscalYear::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/fiscal-years'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/fiscal-years');
    }

    /**
     * Display the specified resource.
     *
     * @param FiscalYear $fiscalYear
     * @throws AuthorizationException
     * @return void
     */
    public function show(FiscalYear $fiscalYear)
    {
        $this->authorize('admin.fiscal-year.show', $fiscalYear);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FiscalYear $fiscalYear
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(FiscalYear $fiscalYear)
    {
        $this->authorize('admin.fiscal-year.edit', $fiscalYear);


        return view('admin.fiscal-year.edit', [
            'fiscalYear' => $fiscalYear,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFiscalYear $request
     * @param FiscalYear $fiscalYear
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFiscalYear $request, FiscalYear $fiscalYear)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values FiscalYear
        $fiscalYear->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/fiscal-years'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/fiscal-years');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFiscalYear $request
     * @param FiscalYear $fiscalYear
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyFiscalYear $request, FiscalYear $fiscalYear)
    {
        $fiscalYear->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFiscalYear $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyFiscalYear $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    FiscalYear::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
