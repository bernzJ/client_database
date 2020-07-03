import AppForm from '../app-components/Form/AppForm';

Vue.component('state-form', {
    mixins: [AppForm],
    props: ['countries'],
    data: function () {
        return {
            form: {
                abbreviation: '',
                name: '',
                country: '',

            }
        }
    }

});
