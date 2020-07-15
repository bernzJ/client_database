import AppForm from '../app-components/Form/AppForm';

Vue.component('tmc-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                comment:  '' ,
                
            }
        }
    }

});