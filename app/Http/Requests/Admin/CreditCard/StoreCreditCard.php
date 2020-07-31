<?php

namespace App\Http\Requests\Admin\CreditCard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCreditCard extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.credit-card.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'bank_name' => ['required', 'string'],
            'payment_type' => ['required', 'string'],
            'statement_cycle' => ['nullable', 'string'],
            'liability' => ['required'],
            'cc_feed' => ['nullable', 'boolean'],
            'payment_method' => ['required'],
            'batch_config' => ['required', 'string'],
            'rebate' => ['required', 'string'],
            'card_program' => ['required'],
            'customer' => ['required'],
            'country' => ['required'],
        ];
    }

    public function getLiabilityId()
    {
        if ($this->has('liability')) {
            return $this->get('liability')['id'];
        }
        return null;
    }

    public function getPaymentMethodId()
    {
        if ($this->has('payment_method')) {
            return $this->get('payment_method')['id'];
        }
        return null;
    }

    public function getCardProgramId()
    {
        if ($this->has('card_program')) {
            return $this->get('card_program')['id'];
        }
        return null;
    }

    public function getCustomerId()
    {
        if ($this->has('customer')) {
            return $this->get('customer')['id'];
        }
        return null;
    }

    public function getCountryIds()
    {
        if ($this->filled('country')) {
            return collect($this->get('country'))->pluck('id');
        }
        return null;
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
