import AppForm from '../app-components/Form/AppForm';

Vue.component('industry-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});