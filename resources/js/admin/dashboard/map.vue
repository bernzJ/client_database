<template>
  <div style="height: 500px; width: 100%">
    <l-map
      v-if="showMap"
      class="poppy"
      :max-zoom="maxZoom"
      :zoom="zoom"
      :center="center"
      :options="mapOptions"
      style="height: 80%"
      @update:center="centerUpdate"
      @update:zoom="zoomUpdate"
    >
      <l-tile-layer :url="url" :attribution="attribution" />
      <l-marker :lat-lng="withPopup" :icon="icon">
        <l-popup>
          <div @click="innerClick" class="container">
            <div class="row header">
              <label class="title">Some title</label>
            </div>
            <div class="row">
              <div class="col-5">
                <label class="key">Address</label>
              </div>
              <div class="col-7">
                <label class="field">d</label>
              </div>
               <div class="col-5">
                <label class="key">Address</label>
              </div>
              <div class="col-7">
                <label class="field">Address</label>
              </div>
               <div class="col-5">
                <label class="key">Address</label>
              </div>
              <div class="col-7">
                <label class="field">Address</label>
              </div>
            </div>
            <div class="row footer">
              <div class="col">
                <a class="main-button">
                  See Details
                  <i class="icon-arrow-right" style="color:#fff;"></i>
                </a>
              </div>
            </div>
          </div>
        </l-popup>
      </l-marker>
    </l-map>
  </div>
</template>

<script>
import { latLng, icon } from "leaflet";
import { LMap, LTileLayer, LMarker, LPopup } from "vue2-leaflet";

import dotSVG from "../../../images/dot.svg";
import dotShadow from "../../../images/dotshadow.svg";

export default {
  name: "Example",
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LPopup
  },
  data() {
    return {
      zoom: 3,
      maxZoom: 20,
      center: latLng(51.505, -0.09),
      url:
        "https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png",
      attribution:
        '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
      withPopup: latLng(51.505, -0.09),
      icon: icon({
        iconUrl: dotSVG,
        iconRetinaUrl: dotSVG,
        iconAnchor: [14, 14],
        popupAnchor: [185, 105],
        iconSize: [28, 28],
        shadowUrl: dotShadow,
        shadowSize: [28, 28],
        shadowAnchor: [14, 14]
      }),
      currentZoom: 3,
      currentCenter: latLng(51.505, -0.09),
      mapOptions: {
        zoomSnap: 0.5,
        zoomControl: false
      },
      showMap: true
    };
  },
  methods: {
    zoomUpdate(zoom) {
      this.currentZoom = zoom;
    },
    centerUpdate(center) {
      this.currentCenter = center;
    },
    innerClick() {
      alert("Click!");
    }
  },
  props: {
    markers: Array
  }
};
</script>

<style>
@import "~leaflet/dist/leaflet.css";
.poppy label {
  font-family: "Montserrat";
}
.poppy .header {
  border-bottom: 1px solid #607183;
  margin-top: 25px;
  margin-bottom: 10px;
}
.poppy .title {
  color: #fff;
  text-transform: uppercase;
  font-size: 12px;
  font-weight: 600;
}
.poppy .field {
  color: #96a9c7;
  font-size: 12px;
  font-weight: 600;
  margin-top: 5px;
}
.poppy .key {
  color: #d5e2f3;
  text-transform: uppercase;
  font-size: 12px;
  font-weight: 600;
  margin-top: 5px;
}
.poppy .footer {
  margin-top: 10px;
  margin-bottom: 10px;
}
.poppy .main-button {
  margin-left: 5px;
  margin-right: 5px;
  color: #fff !important;
  background-color: #4898cf;
  border: none;
  width: 100%;
  display: inline-block;
  font-weight: 400;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  user-select: none;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
    border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.poppy .main-button:hover,
.poppy .main-button:focus {
  text-decoration: none;
  background-color: #55b3f4;
}
.poppy .leaflet-popup {
  width: 305px;
  height: 230px;
}
.poppy .leaflet-popup-content-wrapper {
  background-color: #435061;
  border: none;
  border-radius: 3px;
  height: 100%;
}
.poppy .leaflet-popup-tip-container {
  left: 0;
  top: 55%;
  width: auto;
  height: auto;
  margin-left: -10px;
}
.poppy .leaflet-popup-tip {
  width: 0;
  height: 0;
  padding: 0;
  margin: 0;
  transform: none;
  background-color: transparent;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-right: 10px solid #435061;
}
</style>
