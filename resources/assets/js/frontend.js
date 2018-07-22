window.$ = window.jquery = require('jquery');

window.Vue = require('vue');

import VueI18n from 'vue-i18n';
import locales from 'lang';

require('bootstrap-sass');
require('social-share.js/dist/js/social-share.min');

Vue.use(VueI18n);

Vue.config.lang = window.Language;

const i18n = new VueI18n({
    locale:Vue.config.lang,
    messages:locales
});

const app = new Vue({
    el: '#app',
    i18n:i18n
});