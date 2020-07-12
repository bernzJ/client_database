import AppForm from '../app-components/Form/AppForm';

Vue.component('concur-product-form', {
    mixins: [AppForm],
    props: ['segments'],
    data: function () {
        return {
            form: {
                product: '',
                segment: '',

            }
        }
    }

});
