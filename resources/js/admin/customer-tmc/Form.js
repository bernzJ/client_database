import AppForm from '../app-components/Form/AppForm';

Vue.component('customer-tmc-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                tmc_id:  '' ,
                customer_id:  '' ,
                
            }
        }
    }

});