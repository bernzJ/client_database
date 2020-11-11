<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomersExport implements FromQuery, WithMapping, WithHeadings
{
    //@TODO: implement this.
    /*protected $customers;

    public function __construct(array $customers){
        $this->customers = $customers;
    }

    public function array(): array
    {
        return $this->customers;
    }
    */
    /**
     * @return array
     */
    public function query()
    {
        return Customer::query()
            ->leftJoin('industries', 'customers.industry_id', 'industries.id')
            ->leftJoin('timezones', 'customers.timezone_id', 'timezones.id')
            ->leftJoin('fiscal_year', 'customers.fiscal_year_id', 'fiscal_year.id')
            ->leftJoin('project_scope', 'customers.project_scope_id', 'project_scope.id')
            ->leftJoin('project_type', 'customers.project_type_id', 'project_type.id')
            ->leftJoin('client_type', 'customers.client_type_id', 'client_type.id')
            ->leftJoin('financial', 'customers.financial_id', 'financial.id')
            ->leftJoin('hr', 'customers.hr_id', 'hr.id')
            ->leftJoin('countries', 'customers.country_id', 'countries.id')
            ->leftJoin('state', 'customers.state_id', 'state.id')
            ->leftJoin('employee_group', 'customers.employee_group_id', 'employee_group.id');
    }
    public function headings(): array
    {
        return [
            trans('admin.customer.columns.id'),
            trans('admin.customer.columns.name'),
            trans('admin.customer.columns.website'),
            trans('admin.customer.columns.industry_id'),
            trans('admin.customer.columns.timezone_id'),
            trans('admin.customer.columns.fiscal_year_begin'),
            trans('admin.customer.columns.fiscal_year_end'),
            trans('admin.customer.columns.fiscal_year_month_end_close_period'),
            trans('admin.customer.columns.fiscal_year_quarterly_close_cycle'),
            trans('admin.customer.columns.employees_count'),
            trans('admin.customer.columns.project_type_id'),
            trans('admin.customer.columns.project_scope_id'),
            trans('admin.customer.columns.client_type_id'),
            trans('admin.customer.columns.active_projects'),
            trans('admin.customer.columns.referenceable'),
            trans('admin.customer.columns.opted_out'),
            trans('admin.customer.columns.financial_id'),
            trans('admin.customer.columns.hr_id'),
            trans('admin.customer.columns.sso'),
            trans('admin.customer.columns.test_site'),
            trans('admin.customer.columns.refresh_date'),
            trans('admin.customer.columns.address_1'),
            trans('admin.customer.columns.address_2'),
            trans('admin.customer.columns.address_lng_lat'),
            trans('admin.customer.columns.city'),
            trans('admin.customer.columns.zip'),
            trans('admin.customer.columns.country_id'),
            trans('admin.customer.columns.state_id'),
            trans('admin.customer.columns.lg_account_owner_oversight'),
            trans('admin.customer.columns.lg_sales_owner'),
            trans('admin.customer.columns.employee_group_id'),
        ];
    }

    /**
     * @param Customer $customer
     * @return array
     *
     */
    public function map($customer): array
    {
        return [
            $customer->id,
            $customer->name,
            $customer->website,
            $customer->industry->name,
            $customer->timezone->name,
            array_get($customer->fiscal_year, 'begin'),
            array_get($customer->fiscal_year, 'end'),
            array_get($customer->fiscal_year, 'month_end_close_period'),
            array_get($customer->fiscal_year, 'quarterly_close_cycle'),
            $customer->employees_count,
            array_get($customer->project_type, 'name'),
            array_get($customer->project_scope, 'name'),
            array_get($customer->client_type, 'name'),
            $customer->active_projects ? 'true' : 'false',
            $customer->referenceable ? 'true' : 'false',
            $customer->opted_out ? 'true' : 'false',
            array_get($customer->financial, 'platform'),
            array_get($customer->hr, 'system'),
            $customer->sso ? 'true' : 'false',
            $customer->test_site ? 'true' : 'false',
            $customer->refresh_date,
            $customer->address_1,
            $customer->address_2,
            $customer->address_lng_lat,
            $customer->city,
            $customer->zip,
            array_get($customer->country, 'name'),
            array_get($customer->state, 'name'),
            $customer->lg_account_owner_oversight,
            $customer->lg_sales_owner,
            array_get($customer->employee_group, 'name'),
        ];
    }
}
