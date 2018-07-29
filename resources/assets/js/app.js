/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import httpPlugin from 'plugins/http';
import VueRouter from 'vue-router';
import VueI18n from 'vue-i18n';
import store from './vuex/store';

import 'vue-multiselect/dist/vue-multiselect.min.css';

import routes from './routes.js';
import locales from 'lang';

import App from './App.vue'

window.toastr = require('toastr/build/toastr.min');
window.innerHeight = 800;

window.toastr.options = {
    positionClass: "toast-bottom-right",
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut"
};

Vue.use(httpPlugin);
Vue.use(VueI18n);
Vue.use(VueRouter);

Vue.config.lang = window.Language;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const i18n = new VueI18n({
    locale: Vue.config.lang,
    messages: locales
})

Vue.component(
    'vue-table-pagination',
    require('components/dashboard/TablePagination.vue')
);

Vue.component(
    'vue-table',
    require('components/dashboard/Table.vue')
);

Vue.component(
    'vue-form',
    require('components/dashboard/Form.vue')
);

const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    linkActiveClass: 'active',
    routes: routes
})

new Vue({
    el: '#app',
    router,
    i18n,
    store,
    components: {App},
    template: '<App/>'
})