import AppForm from '../app-components/Form/AppForm';

Vue.component('customer-form', {
    mixins: [AppForm],
    props: ['industries', 'timezones', 'project_types', 'client_types', 'countries', 'states'],
    data: function () {
        return {
            form: {
                name: '',
                website: '',
                industry: '',
                timezone: '',
                fiscal_year_id: '',
                employees_count: '',
                project_type: '',
                client_type: '',
                active_projects: false,
                referenceable: false,
                opted_out: false,
                financial_id: '',
                hr_id: '',
                sso: false,
                test_site: false,
                refresh_date: '',
                logo: '',
                address_1: '',
                address_2: '',
                address_lng_lat: '',
                city: '',
                zip: '',
                country: '',
                state: '',
                lg_account_owner_oversight: '',
                lg_sales_owner: '',
                employee_groups_id: '',
                notes_id: '',

            }
        }
    }

});
