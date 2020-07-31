import AppForm from '../app-components/Form/AppForm';

Vue.component('credit-card-form', {
    mixins: [AppForm],
    props: ['liabilities', 'payment_methods', 'customers', 'countries', 'card_programs',],
    data: function () {
        return {
            form: {
                bank_name: '',
                payment_type: '',
                statement_cycle: '',
                liability: '',
                cc_feed: false,
                payment_method: '',
                batch_config: '',
                rebate: '',
                card_program: '',
                customer: '',
                country: [],
            }
        }
    }

});
