import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
import VueCookie from 'vue-cookie'

Vue.use(VueCookie);
Vue.use(VueAxios, axios);

import App from './App.vue';
import main from './components/main.vue';
import companySchedule from './components/companySchedule.vue'
import studentCRMD from './components/studentCRMD.vue'
import userCRMD from './components/userCRMD.vue'

const routes = [
  {
        name: 'main',
        path: '/',
        component: main
  },
  {
        name: 'companySchedule',
        path: '/companySchedulev',
        component: companySchedule
  },
  {
        name: 'studentCRMD',
        path: '/studentCRMD',
        component: studentCRMD
  },
  {
        name: 'userCRMD',
        path: '/userCRMD',
        component: userCRMD
  },
  
];

const router = new VueRouter({ routes: routes });
new Vue(Vue.util.extend({ router }, App)).$mount('#app');