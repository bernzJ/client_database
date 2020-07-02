import AppForm from '../app-components/Form/AppForm';

Vue.component('liability-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});