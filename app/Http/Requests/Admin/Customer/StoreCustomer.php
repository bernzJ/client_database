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
            'industry' => ['nullable'],
            'timezone' => ['nullable'],
            'fiscal_year.id' => ['nullable'],
            'fiscal_year.begin' => ['nullable'],
            'fiscal_year.end' => ['nullable', 'date'],
            'fiscal_year.month_end_close_period' => ['nullable', 'date'],
            'fiscal_year.quarterly_close_cycle' => ['nullable', 'date'],
            'employees_count' => ['required', 'integer'],
            'project_type' => ['required'],
            'client_type' => ['required'],
            'active_projects' => ['required', 'boolean'],
            'referenceable' => ['required', 'boolean'],
            'opted_out' => ['required', 'boolean'],
            'financial.id' => ['nullable'],
            'financial.platform' => ['nullable'],
            'hr.id' => ['nullable'],
            'hr.system' => ['nullable'],
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
            'lg_account_owner_oversight' => ['required', 'string'],
            'lg_sales_owner' => ['required', 'string'],
            'employee_group.id' => ['nullable'],
            'employee_group.name' => ['nullable'],
            'concur_product' => ['nullable'],
            'tmc' => ['nullable'],

        ];
    }

    public function getIndustryId()
    {
        if ($this->filled('industry')) {
            return $this->get('industry')['id'];
        }
        return null;
    }

    public function getTimezoneId()
    {
        if ($this->filled('timezone')) {
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
        if ($this->filled('country')) {
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
            $data = $this->get('fiscal_year');
            if ($data['begin'] !== null) {
                return [
                    'begin' => $data['begin'],
                    'end' => $data['end'],
                    'month_end_close_period' => $data['month_end_close_period'],
                    'quarterly_close_cycle' => $data['quarterly_close_cycle'],
                ];
            }
        }
        return null;
    }

    public function getFinancialObject()
    {
        if ($this->filled('financial')) {
            $data = $this->get('financial');
            if ($data['platform'] !== null) {
                return [
                    'platform' => $data['platform'],
                ];
            }
        }
        return null;
    }

    public function getHrObject()
    {
        if ($this->filled('hr')) {
            $data = $this->get('hr');
            if ($data['system'] !== null) {
                return [
                    'system' => $data['system'],
                ];
            }
        }
        return null;
    }

    public function getEmployeeGroupObject()
    {
        if ($this->filled('employee_group')) {
            $data = $this->get('employee_group');
            if ($data['name'] !== null) {
                return [
                    'name' => $data['name'],
                ];
            }
        }
        return null;
    }

    public function getTmcIds()
    {
        if ($this->filled('tmc')) {
            return collect($this->get('tmc'))->pluck('id');
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
