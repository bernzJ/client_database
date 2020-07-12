import AppForm from '../app-components/Form/AppForm';

Vue.component('financial-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                platform:  '' ,
                
            }
        }
    }

});