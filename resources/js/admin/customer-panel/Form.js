import AppForm from '../app-components/Form/AppForm';

Vue.component('customer-panel-form', {
    mixins: [AppForm],
    props: ['industries', 'timezones', 'project_types', 'project_scopes', 'client_types', 'countries', 'states', 'concur_products', 'tmcs'],
    data: function () {
        return {
            form: {
                name: '',
                website: '',
                industry: '',
                timezone: '',
                fiscal_year_id: null,
                fiscal_year_begin: null,
                fiscal_year_end: null,
                fiscal_year_month_end_close_period: null,
                fiscal_year_quarterly_close_cycle: null,
                employees_count: '',
                project_type: null,
                project_scope: null,
                client_type: null,
                active_projects: false,
                referenceable: false,
                opted_out: false,
                financial_id: null,
                financial_platform: null,
                hr_id: null,
                hr_system: '',
                sso: false,
                test_site: false,
                refresh_date: '',
                address_1: '',
                address_2: '',
                address_lng_lat: '',
                city: '',
                zip: '',
                country: '',
                state: null,
                lg_account_owner_oversight: '',
                lg_sales_owner: '',
                employee_group_id: null,
                employee_group_name: '',
                notes_id: '',
                concur_product: [],
                tmc: [],
            },
            mediaCollections: ['logos']
        }
    },
    mounted: function () {
        let form = this.form;

        // Fiscal Year
        if (form.fiscal_year) {
            form.fiscal_year_begin = form.fiscal_year.begin;
            form.fiscal_year_end = form.fiscal_year.end;
            form.fiscal_year_month_end_close_period = form.fiscal_year.month_end_close_period;
            form.fiscal_year_quarterly_close_cycle = form.fiscal_year.quarterly_close_cycle;
        }

        // Financial Platform
        if (form.financial) {
            form.financial_platform = form.financial.platform;
        }

        // HR
        if (form.hr) {
            form.hr_system = form.hr.system;
        }

        // Employee Group Name
        if (form.employee_group) {
            form.employee_group_name = form.employee_group.name;
        }

        // @TODO: check if Note is needed
        // form.employee_group_name = form.employee_group.name;
    }

});
