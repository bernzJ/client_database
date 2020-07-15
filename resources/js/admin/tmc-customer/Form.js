import AppForm from '../app-components/Form/AppForm';

Vue.component('tmc-customer-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});