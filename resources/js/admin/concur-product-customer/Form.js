import AppForm from '../app-components/Form/AppForm';

Vue.component('concur-product-customer-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                concur_product_id:  '' ,
                customer_id:  '' ,
                
            }
        }
    }

});