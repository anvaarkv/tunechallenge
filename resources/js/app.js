/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Dashboard from './components/DashboardComponent'
import SingleCard from './components/SingleCard'
import VueResource from 'vue-resource';
import BootstrapVue from 'bootstrap-vue'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap-vue/dist/bootstrap-vue.css"
// Vue.component('pagination', require('laravel-vue-pagination'));
Vue.use(VueResource);
Vue.use(BootstrapVue);


Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr("content");
const app = new Vue({
    el: '#app',
    components: {
        'dashboard-component':  Dashboard,
        'single-card' : SingleCard
    }
});
