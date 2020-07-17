import AppForm from '../app-components/Form/AppForm';

Vue.component('global-footprint-form', {
    mixins: [AppForm],
    props: ['reimbursements', 'countries', 'concur_products'],
    data: function () {
        return {
            form: {
                reimbursement: '',
                concur_product: [],
                country: [],
            }
        }
    }

});
