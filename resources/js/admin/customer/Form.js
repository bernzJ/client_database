import AppForm from '../app-components/Form/AppForm';

Vue.component('customer-form', {
    mixins: [AppForm],
    props: ['industries'],
    data: function () {
        return {
            form: {
                name: '',
                website: '',
                industry: '',
                timezone_id: '',
                fiscal_year_id: '',
                employees_count: '',
                project_type_id: '',
                client_type_id: '',
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
                country_id: '',
                state_id: '',
                lg_account_owner_oversight: '',
                lg_sales_owner: '',
                employee_groups_id: '',
                notes_id: '',

            }
        }
    }

});
