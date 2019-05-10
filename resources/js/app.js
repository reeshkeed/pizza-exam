import App from './components/App.vue';
import router from './router';

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    router,
    components: { App }
});
