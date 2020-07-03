import AppListing from '../app-components/Listing/AppListing';

Vue.component('state-listing', {
    mixins: [AppListing],

    data() {
        return {
            showCountriesFilter: false,
            countriesMultiselect: {},

            filters: {
                countries: [],
            },
        }
    },

    watch: {
        showCountriesFilter: function (newVal, oldVal) {
            this.countriesMultiselect = [];
        },
        countriesMultiselect: function (newVal, oldVal) {
            this.filters.countries = newVal.map(function (object) { return object['key']; });
            this.filter('countries', this.filters.countries);
        },
    }
});
