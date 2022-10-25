
require('./bootstrap');

window.Vue = require('vue');

window.axios = require('axios');

import App from './components/App.vue';
//  Router import
import router from './router.js';
const root = new Vue({
    router,
    el: '#root',
    render: h => h(App)
})
