<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CardProgram\BulkDestroyCardProgram;
use App\Http\Requests\Admin\CardProgram\DestroyCardProgram;
use App\Http\Requests\Admin\CardProgram\IndexCardProgram;
use App\Http\Requests\Admin\CardProgram\StoreCardProgram;
use App\Http\Requests\Admin\CardProgram\UpdateCardProgram;
use App\Models\CardProgram;
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

class CardProgramsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCardProgram $request
     * @return array|Factory|View
     */
    public function index(IndexCardProgram $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CardProgram::class)->processRequestAndGet(
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

        return view('admin.card-program.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.card-program.create');

        return view('admin.card-program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCardProgram $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCardProgram $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CardProgram
        $cardProgram = CardProgram::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/card-programs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/card-programs');
    }

    /**
     * Display the specified resource.
     *
     * @param CardProgram $cardProgram
     * @throws AuthorizationException
     * @return void
     */
    public function show(CardProgram $cardProgram)
    {
        $this->authorize('admin.card-program.show', $cardProgram);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CardProgram $cardProgram
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CardProgram $cardProgram)
    {
        $this->authorize('admin.card-program.edit', $cardProgram);


        return view('admin.card-program.edit', [
            'cardProgram' => $cardProgram,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCardProgram $request
     * @param CardProgram $cardProgram
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCardProgram $request, CardProgram $cardProgram)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CardProgram
        $cardProgram->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/card-programs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/card-programs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCardProgram $request
     * @param CardProgram $cardProgram
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCardProgram $request, CardProgram $cardProgram)
    {
        $cardProgram->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCardProgram $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCardProgram $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CardProgram::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
