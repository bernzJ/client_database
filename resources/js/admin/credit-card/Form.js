import AppForm from '../app-components/Form/AppForm';

Vue.component('credit-card-form', {
    mixins: [AppForm],
    props: ['liabilities', 'payment_methods', 'customers', 'countries',],
    data: function () {
        return {
            form: {
                bank_name: '',
                payment_type: '',
                statement_cycle: '',
                liability: '',
                cc_feed: false,
                payment_method_id: '',
                batch_config: '',
                rebate: '',
                card_program_type_id: '',
                customer_id: '',
                country: [],
            }
        }
    }

});
