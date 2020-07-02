import AppForm from '../app-components/Form/AppForm';

Vue.component('fiscal-year-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                begin:  '' ,
                end:  '' ,
                month_end_close_period:  '' ,
                quarterly_close_cycle:  '' ,
                
            }
        }
    }

});