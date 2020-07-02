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
            'timezone_id' => ['sometimes', 'integer'],
            'fiscal_year_id' => ['nullable', 'integer'],
            'employees_count' => ['sometimes', 'integer'],
            'project_type_id' => ['sometimes', 'integer'],
            'client_type_id' => ['nullable', 'integer'],
            'active_projects' => ['sometimes', 'boolean'],
            'referenceable' => ['sometimes', 'boolean'],
            'opted_out' => ['sometimes', 'boolean'],
            'financial_id' => ['nullable', 'integer'],
            'hr_id' => ['nullable', 'integer'],
            'sso' => ['sometimes', 'boolean'],
            'test_site' => ['sometimes', 'boolean'],
            'refresh_date' => ['nullable', 'date'],
            'logo' => ['nullable', 'string'],
            'address_1' => ['sometimes', 'string'],
            'address_2' => ['nullable', 'string'],
            'address_lng_lat' => ['sometimes', 'string'],
            'city' => ['nullable', 'string'],
            'zip' => ['nullable', 'string'],
            'country_id' => ['sometimes', 'integer'],
            'state_id' => ['sometimes', 'integer'],
            'lg_account_owner_oversight' => ['nullable', 'string'],
            'lg_sales_owner' => ['nullable', 'string'],
            'employee_groups_id' => ['nullable', 'integer'],
            'notes_id' => ['nullable', 'integer'],

        ];
    }

    public function getIndustryId()
    {
        if ($this->has('industry')) {
            return $this->get('industry')['id'];
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
