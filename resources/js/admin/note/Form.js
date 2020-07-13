import AppForm from '../app-components/Form/AppForm';

Vue.component('note-form', {
    mixins: [AppForm],
    props: ['customers'],
    data: function () {
        return {
            form: {
                company_culture: '',
                strategic_goals: '',
                compliance: '',
                customer: '',
            }
        }
    }

});
