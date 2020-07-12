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
            'timezone' => ['required'],
            'fiscal_year.id' => ['nullable'],
            'fiscal_year.begin' => ['required_without:fiscal_year.id'],
            'fiscal_year.end' => ['nullable', 'date'],
            'fiscal_year.month_end_close_period' => ['nullable', 'date'],
            'fiscal_year.quarterly_close_cycle' => ['nullable', 'date'],
            'employees_count' => ['required', 'integer'],
            'project_type' => ['nullable'],
            'client_type' => ['required'],
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
            'country' => ['required'],
            'state' => ['nullable'],
            'lg_account_owner_oversight' => ['nullable', 'string'],
            'lg_sales_owner' => ['nullable', 'string'],
            'employee_groups_id' => ['nullable', 'integer'],
            'notes_id' => ['nullable', 'integer'],
            'concur_product' => ['required'],

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
        if ($this->filled('project_type')) {
            return $this->get('project_type')['id'];
        }
        return null;
    }

    public function getClientTypeId()
    {
        if ($this->filled('client_type')) {
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
        if ($this->filled('state')) {
            return $this->get('state')['id'];
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


    public function getFiscalYearObject()
    {
        if ($this->filled('fiscal_year')) {
            return collect($this->get('fiscal_year'))
                ->only(['begin', 'end', 'month_end_close_period', 'quarterly_close_cycle'])
                ->all();
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
