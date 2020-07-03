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
            'timezone' => ['required'],
            'fiscal_year_id' => ['nullable', 'integer'],
            'employees_count' => ['sometimes', 'integer'],
            'project_type' => ['required'],
            'client_type' => ['nullable'],
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
            'country' => ['required'],
            'state' => ['nullable', 'required'],
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

    public function getTimezoneId()
    {
        if ($this->has('timezone')) {
            return $this->get('timezone')['id'];
        }
        return null;
    }

    public function getProjectTypeId()
    {
        if ($this->has('project_type')) {
            return $this->get('project_type')['id'];
        }
        return null;
    }

    public function getClientTypeId()
    {
        if ($this->has('client_type')) {
            return $this->get('client_type')['id'];
        }
        return null;
    }

    public function getCountryId()
    {
        if ($this->has('country')) {
            return $this->get('country')['id'];
        }
        return null;
    }

    public function getStateId()
    {
        if ($this->has('state')) {
            return $this->get('state')['id'];
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
