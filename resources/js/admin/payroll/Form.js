import AppForm from '../app-components/Form/AppForm';

Vue.component('payroll-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});