import AppForm from '../app-components/Form/AppForm';

Vue.component('customer-form', {
    mixins: [AppForm],
    props: ['industries', 'timezones', 'project_types', 'client_types', 'countries', 'states', 'concur_products', 'fiscal_years', 'financials'],
    data: function () {
        return {
            form: {
                name: '',
                website: '',
                industry: '',
                timezone: '',
                fiscal_year: {
                    id: null,
                    begin: null,
                    end: null,
                    month_end_close_period: null,
                    quarterly_close_cycle: null,
                },
                employees_count: '',
                project_type: null,
                client_type: null,
                active_projects: false,
                referenceable: false,
                opted_out: false,
                financial: {
                    id: null,
                    platform: '',
                },
                hr_id: '',
                sso: false,
                test_site: false,
                refresh_date: '',
                logo: '',
                address_1: '',
                address_2: '',
                address_lng_lat: '{"lat":48.0679191,"lng":-65.5320324}',
                city: '',
                zip: '',
                country: '',
                state: null,
                lg_account_owner_oversight: '',
                lg_sales_owner: '',
                employee_groups_id: '',
                notes_id: '',
                concur_product: [],
            }
        }
    }
});
