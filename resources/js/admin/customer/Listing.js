import AppListing from '../app-components/Listing/AppListing';

Vue.component('customer-listing', {
    mixins: [AppListing],

    data() {
        return {
            showIndustriesFilter: false,
            showTimezonesFilter: false,
            showProjectTypesFilter: false,
            showProjectScopesFilter: false,
            showClientTypesFilter: false,
            showCountriesFilter: false,
            showStatesFilter: false,
            showConcurProductsFilter: false,
            showTMCsFilter: false,

            industriesMultiselect: {},
            timezonesMultiselect: {},
            projectTypesMultiselect: {},
            projectScopesMultiselect: {},
            clientTypesMultiselect: {},
            countriesMultiselect: {},
            statesMultiselect: {},
            concurProductsMultiselect: {},
            TMCsMultiselect: {},

            filters: {
                industries: [],
                timezones: [],
                projectTypes: [],
                projectScopes: [],
                clientTypes: [],
                countries: [],
                states: [],
                concurProducts: [],
                TMCs: [],
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
        showProjectScopesFilter: function (newVal, oldVal) {
            this.projectScopesMultiselect = [];
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
        showConcurProductsFilter: function (newVal, oldVal) {
            this.concurProductsMultiselect = [];
        },
        showTMCsFilter: function (newVal, oldVal) {
            this.TMCsMultiselect = [];
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
        projectScopesMultiselect: function (newVal, oldVal) {
            this.filters.projectScopes = newVal.map(function (object) { return object['key']; });
            this.filter('projectScopes', this.filters.projectScopes);
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
        concurProductsMultiselect: function (newVal, oldVal) {
            this.filters.concurProducts = newVal.map(function (object) { return object['key']; });
            this.filter('concurProducts', this.filters.concurProducts);
        },
        TMCsMultiselect: function (newVal, oldVal) {
            this.filters.TMCs = newVal.map(function (object) { return object['key']; });
            this.filter('TMCs', this.filters.TMCs);
        },
    }
});
