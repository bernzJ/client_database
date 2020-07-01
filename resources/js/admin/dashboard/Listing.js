import AppListing from '../app-components/Listing/AppListing';
import MapVue from './map.vue';

Vue.component('dashboard-listing', {
    mixins: [AppListing]
});
Vue.component('map-vue', MapVue);
