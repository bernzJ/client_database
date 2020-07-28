import AppForm from '../app-components/Form/AppForm';

Vue.component('stakeholder-form', {
    mixins: [AppForm],
    props: ['customers', 'timezones', 'contact_methods'],
    data: function () {
        return {
            form: {
                role: '',
                name: '',
                email: '',
                phone: '',
                contact_method: '',
                timezone: '',
                customer: '',

            }
        }
    }

});
