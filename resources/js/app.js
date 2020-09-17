/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue              from 'vue'
import router           from './routes/index';
import Header           from './components/includes/Header';
import Footer           from './components/includes/Footer';
import LeftCategory     from './components/includes/LeftCategory';
import RightAdContent   from './components/includes/RightAdContent';
import StepProfile      from './components/StepProfile';

// import plugin
import VueToastr from "vue-toastr";
// use plugin
Vue.use(VueToastr, {
    /* OverWrite Plugin Options if you need */
    defaultTimeout: 5000,
    defaultProgressBar: true,
    defaultProgressBarValue: 0,
    defaultClassNames: ["animated", "fadeIn"]
});

// Vue.prototype.ApiUrl = process.env.AUDIENCE_DOMAIN;
Vue.prototype.ApiUrl = 'http://gofans.test/'; // local
// Vue.prototype.ApiUrl = 'https://gofans.org/'; // Live


const app = new Vue({
    router,
    components :{
        'web-header':Header,
        'web-footer':Footer,
        'left-category':LeftCategory,
        'right-ad-content':RightAdContent,
        'step-profile':StepProfile,
    }
}).$mount('#app');
