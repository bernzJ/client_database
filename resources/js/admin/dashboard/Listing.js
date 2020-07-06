import AppListing from '../app-components/Listing/AppListing';
import MapVue from './map.vue';

Vue.component('dashboard-listing', {
    mixins: [AppListing],
    props: ['data'],
    computed: {
        stats: function () {
            const markers = this.data;
            return {
                activeProjects: markers.filter(marker => marker.active_projects).length,
                activeClients: markers.length
            };
        }
    }
});

Vue.component('map-vue', MapVue);
