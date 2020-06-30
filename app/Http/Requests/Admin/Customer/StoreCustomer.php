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
            'timezone' => ['required', 'integer'],
            'fiscal_year' => ['required', 'integer'],
            'employees_count' => ['required', 'integer'],
            'project_type' => ['required', 'integer'],
            'client_type' => ['required', 'integer'],
            'active_projects' => ['required', 'boolean'],
            'referenceable' => ['required', 'boolean'],
            'opted_out' => ['required', 'boolean'],
            'financial' => ['required', 'integer'],
            'hr' => ['required', 'integer'],
            'sso' => ['required', 'boolean'],
            'test_site' => ['required', 'boolean'],
            'refresh_date' => ['required', 'date'],
            'logo' => ['required', 'string'],
            'address_1' => ['required', 'string'],
            'address_2' => ['required', 'string'],
            'address_lng_lat' => ['required', 'string'],
            'city' => ['required', 'string'],
            'zip' => ['required', 'string'],
            'country' => ['required', 'integer'],
            'state' => ['required', 'integer'],
            'lg_account_owner_oversight' => ['required', 'string'],
            'lg_sales_owner' => ['required', 'string'],
            'employee_groups' => ['required', 'integer'],
            'notes' => ['required', 'integer'],

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
