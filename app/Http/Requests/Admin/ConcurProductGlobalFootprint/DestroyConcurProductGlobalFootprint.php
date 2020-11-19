<?php

namespace App\Http\Requests\Admin\ConcurProductGlobalFootprint;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class DestroyConcurProductGlobalFootprint extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.concur-product-global-footprint.delete', $this->concurProductGlobalFootprint);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }
}
