import AppForm from '../app-components/Form/AppForm';

Vue.component('concur-product-global-footprint-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                global_footprint_id:  '' ,
                concur_product_id:  '' ,
                
            }
        }
    }

});