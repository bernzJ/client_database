<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountryCreditCard\BulkDestroyCountryCreditCard;
use App\Http\Requests\Admin\CountryCreditCard\DestroyCountryCreditCard;
use App\Http\Requests\Admin\CountryCreditCard\IndexCountryCreditCard;
use App\Http\Requests\Admin\CountryCreditCard\StoreCountryCreditCard;
use App\Http\Requests\Admin\CountryCreditCard\UpdateCountryCreditCard;
use App\Models\CountryCreditCard;
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

class CountryCreditCardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCountryCreditCard $request
     * @return array|Factory|View
     */
    public function index(IndexCountryCreditCard $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CountryCreditCard::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'credit_card_id', 'country_id'],

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

        return view('admin.country-credit-card.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.country-credit-card.create');

        return view('admin.country-credit-card.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCountryCreditCard $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCountryCreditCard $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CountryCreditCard
        $countryCreditCard = CountryCreditCard::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/country-credit-cards'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/country-credit-cards');
    }

    /**
     * Display the specified resource.
     *
     * @param CountryCreditCard $countryCreditCard
     * @throws AuthorizationException
     * @return void
     */
    public function show(CountryCreditCard $countryCreditCard)
    {
        $this->authorize('admin.country-credit-card.show', $countryCreditCard);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CountryCreditCard $countryCreditCard
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CountryCreditCard $countryCreditCard)
    {
        $this->authorize('admin.country-credit-card.edit', $countryCreditCard);


        return view('admin.country-credit-card.edit', [
            'countryCreditCard' => $countryCreditCard,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCountryCreditCard $request
     * @param CountryCreditCard $countryCreditCard
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCountryCreditCard $request, CountryCreditCard $countryCreditCard)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CountryCreditCard
        $countryCreditCard->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/country-credit-cards'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/country-credit-cards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCountryCreditCard $request
     * @param CountryCreditCard $countryCreditCard
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCountryCreditCard $request, CountryCreditCard $countryCreditCard)
    {
        $countryCreditCard->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCountryCreditCard $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCountryCreditCard $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CountryCreditCard::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
