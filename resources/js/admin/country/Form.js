import AppForm from '../app-components/Form/AppForm';

Vue.component('country-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                two_char_country_code:  '' ,
                three_char_country_code:  '' ,
                
            }
        }
    }

});