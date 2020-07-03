import AppListing from '../app-components/Listing/AppListing';

Vue.component('customer-listing', {
    mixins: [AppListing],

    data() {
        return {
            showIndustriesFilter: false,
            showTimezonesFilter: false,
            showProjectTypesFilter: false,
            showClientTypesFilter: false,
            showCountriesFilter: false,
            showStatesFilter: false,

            industriesMultiselect: {},
            timezonesMultiselect: {},
            projectTypesMultiselect: {},
            clientTypesMultiselect: {},
            countriesMultiselect: {},
            statesMultiselect: {},

            filters: {
                industries: [],
                timezones: [],
                projectTypes: [],
                clientTypes: [],
                countries: [],
                states: [],
            },
        }
    },

    watch: {
        showIndustriesFilter: function (newVal, oldVal) {
            this.industriesMultiselect = [];
        },
        showTimezonesFilter: function (newVal, oldVal) {
            this.timezonesMultiselect = [];
        },
        showProjectTypesFilter: function (newVal, oldVal) {
            this.projectTypesMultiselect = [];
        },
        showClientTypesFilter: function (newVal, oldVal) {
            this.clientTypesMultiselect = [];
        },
        showCountriesFilter: function (newVal, oldVal) {
            this.countriesMultiselect = [];
        },
        showStatesFilter: function (newVal, oldVal) {
            this.statesMultiselect = [];
        },

        industriesMultiselect: function (newVal, oldVal) {
            this.filters.industries = newVal.map(function (object) { return object['key']; });
            this.filter('industries', this.filters.industries);
        },
        timezonesMultiselect: function (newVal, oldVal) {
            this.filters.timezones = newVal.map(function (object) { return object['key']; });
            this.filter('timezones', this.filters.timezones);
        },
        projectTypesMultiselect: function (newVal, oldVal) {
            this.filters.projectTypes = newVal.map(function (object) { return object['key']; });
            this.filter('projectTypes', this.filters.projectTypes);
        },
        clientTypesMultiselect: function (newVal, oldVal) {
            this.filters.clientTypes = newVal.map(function (object) { return object['key']; });
            this.filter('clientTypes', this.filters.clientTypes);
        },
        countriesMultiselect: function (newVal, oldVal) {
            this.filters.countries = newVal.map(function (object) { return object['key']; });
            this.filter('countries', this.filters.countries);
        },
        statesMultiselect: function (newVal, oldVal) {
            this.filters.states = newVal.map(function (object) { return object['key']; });
            this.filter('states', this.filters.states);
        },
    }
});
