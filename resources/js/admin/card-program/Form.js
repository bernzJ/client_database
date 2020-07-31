import AppForm from '../app-components/Form/AppForm';

Vue.component('card-program-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});