require('./bootstrap');
import axios from 'axios';
import Vue from 'vue';
window.Vue = require('vue');
var moment = require('moment');
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
axios.defaults.headers.post["X-CSRF-TOKEN"] = $('meta[name=csrf-token]').attr("content");
axios.defaults.headers.post["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.baseURL = location.origin;
Vue.prototype.$moment = moment;
Vue.prototype.$fechaActual = moment().format("YYYY-MM-DD");

const files = require.context('./pages/', true, /\.vue$/i);
files.keys().map(key=> Vue.component(`component-${key.split("/").pop().split(".")[0]}`,files(key).default));

const appPages = new Vue({
  el: '#content-system',
});