/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');

 import Vue from 'vue'
 import BootstrapVue from 'bootstrap-vue'
 //import Vuesax from 'vuesax'

 Vue.use(BootstrapVue);
 //Vue.use(Vuesax);

 import 'bootstrap/dist/css/bootstrap.css'
 import 'bootstrap-vue/dist/bootstrap-vue.css'
 //import 'vuesax/dist/vuesax.css' //Vuesax styles
 //import 'material-icons/iconfont/material-icons.css';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('form-product-component', require('./components/FormProductComponent.vue').default);
Vue.component('products-component', require('./components/ProductsComponent.vue').default);
Vue.component('product-component', require('./components/ProductComponent.vue').default);
Vue.component('alert-component', require('./components/AlertComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.prototype.$ProductHub = new Vue();
Vue.prototype.$AlertHub = new Vue();

const app = new Vue({
    el: '#app',
});
