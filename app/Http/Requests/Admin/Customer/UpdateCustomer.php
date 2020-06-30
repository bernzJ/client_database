<?php

namespace App\Http\Requests\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCustomer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.customer.edit', $this->customer);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'website' => ['nullable', 'string'],
            'industry' => ['required'],
            'timezone' => ['sometimes', 'integer'],
            'fiscal_year' => ['sometimes', 'integer'],
            'employees_count' => ['sometimes', 'integer'],
            'project_type' => ['sometimes', 'integer'],
            'client_type' => ['sometimes', 'integer'],
            'active_projects' => ['sometimes', 'boolean'],
            'referenceable' => ['sometimes', 'boolean'],
            'opted_out' => ['sometimes', 'boolean'],
            'financial' => ['sometimes', 'integer'],
            'hr' => ['sometimes', 'integer'],
            'sso' => ['sometimes', 'boolean'],
            'test_site' => ['sometimes', 'boolean'],
            'refresh_date' => ['sometimes', 'date'],
            'logo' => ['sometimes', 'string'],
            'address_1' => ['sometimes', 'string'],
            'address_2' => ['sometimes', 'string'],
            'address_lng_lat' => ['sometimes', 'string'],
            'city' => ['sometimes', 'string'],
            'zip' => ['sometimes', 'string'],
            'country' => ['sometimes', 'integer'],
            'state' => ['sometimes', 'integer'],
            'lg_account_owner_oversight' => ['sometimes', 'string'],
            'lg_sales_owner' => ['sometimes', 'string'],
            'employee_groups' => ['sometimes', 'integer'],
            'notes' => ['sometimes', 'integer'],

        ];
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

    public function getIndustryId()
    {
        if ($this->has('industry')) {
            return $this->get('industry')['id'];
        }
        return null;
    }
}
