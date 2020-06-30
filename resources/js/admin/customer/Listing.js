import AppListing from '../app-components/Listing/AppListing';

Vue.component('customer-listing', {
    mixins: [AppListing],

    data() {
        return {
            showIndustriesFilter: false,
            industriesMultiselect: {},

            filters: {
                industries: [],
            },
        }
    },

    watch: {
        showIndustriesFilter: function (newVal, oldVal) {
            this.industriesMultiselect = [];
        },
        industriesMultiselect: function (newVal, oldVal) {
            this.filters.industries = newVal.map(function (object) { return object['key']; });
            this.filter('industries', this.filters.industries);
        }
    }
});
