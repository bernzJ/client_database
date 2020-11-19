import AppForm from '../app-components/Form/AppForm';

Vue.component('country-credit-card-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                credit_card_id:  '' ,
                country_id:  '' ,
                
            }
        }
    }

});