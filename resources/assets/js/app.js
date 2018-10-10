import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import App from './App.vue';
import main from './components/main.vue';

const routes = [
  {
      name: 'main',
      path: '/',
      component: main
  }
];

const router = new VueRouter({ routes: routes });
new Vue(Vue.util.extend({ router }, App)).$mount('#app');