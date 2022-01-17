require('./bootstrap');

import axios from 'axios';

window.Vue = require('vue').default;

Vue.component('app', require('./components/app.vue').default);

const app = new Vue({
  el: '#UrlShortenerApp',
  axios
});
