<?php

namespace App\Http\Requests\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCustomer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.customer.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'website' => ['nullable', 'string'],
            'industry' => ['required'],
            'timezone_id' => ['required', 'integer'],
            'fiscal_year_id' => ['nullable', 'integer'],
            'employees_count' => ['required', 'integer'],
            'project_type_id' => ['required', 'integer'],
            'client_type_id' => ['nullable', 'integer'],
            'active_projects' => ['required', 'boolean'],
            'referenceable' => ['required', 'boolean'],
            'opted_out' => ['required', 'boolean'],
            'financial_id' => ['nullable', 'integer'],
            'hr_id' => ['nullable', 'integer'],
            'sso' => ['required', 'boolean'],
            'test_site' => ['required', 'boolean'],
            'refresh_date' => ['nullable', 'date'],
            'logo' => ['nullable', 'string'],
            'address_1' => ['required', 'string'],
            'address_2' => ['nullable', 'string'],
            'address_lng_lat' => ['required', 'string'],
            'city' => ['nullable', 'string'],
            'zip' => ['nullable', 'string'],
            'country_id' => ['required', 'integer'],
            'state_id' => ['required', 'integer'],
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
