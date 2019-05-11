import App from './components/App.vue';
import router from './router';
import axios from 'axios';

window.Vue = require('vue');

Vue.prototype.$http = axios.create({
  baseURL: location.origin
});

const app = new Vue({
    el: '#app',
    router,
    components: { App }
});
