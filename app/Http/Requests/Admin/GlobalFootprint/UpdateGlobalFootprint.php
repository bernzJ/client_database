<?php

namespace App\Http\Requests\Admin\GlobalFootprint;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateGlobalFootprint extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.global-footprint.edit', $this->globalFootprint);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'reimbursement' => ['required'],
            'concur_product' => ['required'],
            'country' => ['required'],
        ];
    }

    public function getReimbursementId()
    {
        if ($this->has('reimbursement')) {
            return $this->get('reimbursement')['id'];
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

    public function getConcurProductIds()
    {
        if ($this->filled('concur_product')) {
            return collect($this->get('concur_product'))->pluck('id');
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
