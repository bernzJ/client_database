<?php

namespace App\Http\Requests\Admin\ConcurProductGlobalFootprint;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class BulkDestroyConcurProductGlobalFootprint extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.concur-product-global-footprint.bulk-delete');
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
