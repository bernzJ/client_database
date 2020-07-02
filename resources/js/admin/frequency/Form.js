import AppForm from '../app-components/Form/AppForm';

Vue.component('frequency-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});