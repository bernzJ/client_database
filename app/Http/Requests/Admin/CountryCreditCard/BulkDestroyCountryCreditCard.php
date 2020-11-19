<?php

namespace App\Http\Requests\Admin\CountryCreditCard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class BulkDestroyCountryCreditCard extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.country-credit-card.bulk-delete');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'ids.*' => 'integer'
        ];
    }
}
