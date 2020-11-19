import AppForm from '../app-components/Form/AppForm';

Vue.component('country-global-footprint-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                global_footprint_id:  '' ,
                country_id:  '' ,
                
            }
        }
    }

});