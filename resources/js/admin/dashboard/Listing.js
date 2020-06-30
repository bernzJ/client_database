import AppListing from '../app-components/Listing/AppListing';
import MapVue from './map.vue';
import { latLng } from "leaflet";
import { LMap, LTileLayer, LMarker, LPopup, LTooltip } from "vue2-leaflet";

Vue.component('dashboard-listing', {
    mixins: [AppListing]
});
new Vue({
    el: '#map-vue',
    template: '<map-vue/>',
    components: { MapVue }
});
