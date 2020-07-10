import AppForm from '../app-components/Form/AppForm';

Vue.component('concur-product-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                product:  '' ,
                segment_id:  '' ,
                
            }
        }
    }

});