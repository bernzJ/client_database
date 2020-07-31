<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreditCard\BulkDestroyCreditCard;
use App\Http\Requests\Admin\CreditCard\DestroyCreditCard;
use App\Http\Requests\Admin\CreditCard\IndexCreditCard;
use App\Http\Requests\Admin\CreditCard\StoreCreditCard;
use App\Http\Requests\Admin\CreditCard\UpdateCreditCard;
use App\Models\Country;
use App\Models\CreditCard;
use App\Models\Customer;
use App\Models\Liability;
use App\Models\PaymentMethod;
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

class CreditCardsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCreditCard $request
     * @return array|Factory|View
     */
    public function index(IndexCreditCard $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CreditCard::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'bank_name', 'payment_type', 'statement_cycle', 'liability_id', 'cc_feed', 'payment_method_id', 'batch_config', 'rebate', 'card_program_id', 'customer_id'],

            // set columns to searchIn
            ['id', 'bank_name', 'payment_type', 'statement_cycle', 'batch_config', 'rebate', 'card_program_id'],

            function ($query) use ($request) {
                if ($request->has('liabilities')) {
                    $query->whereIn('liability_id', $request->get('liabilities'));
                }
                if ($request->has('payment_methods')) {
                    $query->whereIn('payment_method_id', $request->get('payment_methods'));
                }
                if ($request->has('card_programs')) {
                    $query->whereIn('card_program_id', $request->get('card_programs'));
                }
                if ($request->has('customers')) {
                    $query->whereIn('customer_id', $request->get('customers'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.credit-card.index', [
            'data' => $data,
            'liabilities' => Liability::all(),
            'payment_methods' => PaymentMethod::all(),
            'customers' => Customer::all(),
            'countries' => Country::all(),
            'card_programs' => CardProgram::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.credit-card.create');

        return view('admin.credit-card.create', [
            'liabilities' => Liability::all(),
            'payment_methods' => PaymentMethod::all(),
            'customers' => Customer::all(),
            'countries' => Country::all(),
            'card_programs' => CardProgram::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCreditCard $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCreditCard $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['liability_id'] = $request->getLiabilityId();
        $sanitized['payment_method_id'] = $request->getPaymentMethodId();
        $sanitized['card_program_id'] = $request->getCardProgramId();
        $sanitized['customer_id'] = $request->getCustomerId();

        // Store the CreditCard
        $creditCard = CreditCard::create($sanitized);

        // Store countries
        $country_ids = $request->getCountryIds();
        $creditCard->country()->attach($country_ids);

        if ($request->ajax()) {
            return ['redirect' => url('admin/credit-cards'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/credit-cards');
    }

    /**
     * Display the specified resource.
     *
     * @param CreditCard $creditCard
     * @throws AuthorizationException
     * @return void
     */
    public function show(CreditCard $creditCard)
    {
        $this->authorize('admin.credit-card.show', $creditCard);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CreditCard $creditCard
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CreditCard $creditCard)
    {
        $this->authorize('admin.credit-card.edit', $creditCard);


        return view('admin.credit-card.edit', [
            'creditCard' => $creditCard,
            'liabilities' => Liability::all(),
            'payment_methods' => PaymentMethod::all(),
            'customers' => Customer::all(),
            'countries' => Country::all(),
            'card_programs' => CardProgram::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCreditCard $request
     * @param CreditCard $creditCard
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCreditCard $request, CreditCard $creditCard)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['liability_id'] = $request->getLiabilityId();
        $sanitized['payment_method_id'] = $request->getPaymentMethodId();
        $sanitized['card_program_id'] = $request->getCardProgramId();
        $sanitized['customer_id'] = $request->getCustomerId();

        $country_ids = $request->getCountryIds();
        $creditCard->country()->sync($country_ids);

        // Update changed values CreditCard
        $creditCard->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/credit-cards'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/credit-cards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCreditCard $request
     * @param CreditCard $creditCard
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCreditCard $request, CreditCard $creditCard)
    {
        $creditCard->country()->detach();
        $creditCard->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCreditCard $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCreditCard $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    $creditCard = CreditCard::whereIn('id', $bulkChunk);
                    $creditCard->country()->detach();
                    $creditCard->delete();
                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
