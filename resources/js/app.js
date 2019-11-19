/**
 * created by phuclv 11/11/2019
 */
require('./bootstrap');

window.Vue = require('vue');

import VueResource from 'vue-resource';
Vue.use(require('vue-resource'));
Vue.component('pagination', require('laravel-vue-pagination'));
// Vue.component('index-component', require('./components/IndexComponent.vue'));


import VueRouter from 'vue-router';
Vue.use(VueRouter);



// import Vue from 'vue';
// import BootstrapVue from 'bootstrap-vue';

// Vue.use(BootstrapVue);

// import 'bootstrap/dist/css/bootstrap.css';
// import 'bootstrap-vue/dist/bootstrap-vue.css';


import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

//Import 4 component và khai báo luôn điều hướng cho 4 component đó, url nào thì hiển thị component đó
import HomeComponent from './components/HomeComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import IndexComponent from './components/IndexComponent.vue';
import EditComponent from './components/EditComponent.vue';

const routes = [
    {
        //Trang chủ
        name: 'home',
        path: '/',
        component: HomeComponent
    },
    {
        //Tạo mới dữ liệu
        name: 'create',
        path: '/create',
        component: CreateComponent
    },
    {
        //Posts được coi là Index (load trang lúc đầu)
        name: 'lists',
        path: '/lists',
        component: IndexComponent
    },
    {
        //Sửa dữ liệu
        name: 'edit',
        path: '/edit/:id',
        component: EditComponent
    }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');