import AppForm from '../app-components/Form/AppForm';

Vue.component('hr-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                system:  '' ,
                
            }
        }
    }

});