import AppForm from '../app-components/Form/AppForm';

Vue.component('reimbursement-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                type:  '' ,
                
            }
        }
    }

});