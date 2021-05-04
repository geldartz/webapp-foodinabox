/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');
 import moment from 'moment';
 
 import { Form, HasError, AlertError } from 'vform';
 
 
 import Gate from "./Gate";
 Vue.prototype.$gate = new Gate(window.user);
 import swal from 'sweetalert2';
 import vSelect from "vue-select";
 import Select2 from "select2";
 import CKEditor from 'ckeditor4-vue';
 var numeral = require("numeral");
 window.Fire =  new Vue();
 
 window.swal = swal;
 const Toast = swal.mixin({
     toast: true,
     position: 'top-end',
     showConfirmButton: false,
     timer: 2000,
     timerProgressBar: true,
     didOpen: (toast) => {
       toast.addEventListener('mouseenter', Swal.stopTimer)
       toast.addEventListener('mouseleave', Swal.resumeTimer)
     }
 });
 
 Vue.use( CKEditor );
 window.Toast = Toast;
 Vue.component("v-select", vSelect);
 Vue.component("select2", Select2);
 import VueProgressBar from 'vue-progressbar'
 Vue.use(VueProgressBar, {
     color: 'rgb(143, 255, 199)',
     failedColor: 'red',
     height: '3px'
   });
 
 window.Form = Form;
 Vue.component(HasError.name, HasError)
 Vue.component(AlertError.name, AlertError)
 
 
 
 /**
  * Routes imports and assigning
  */
 import VueRouter from 'vue-router';
 Vue.use(VueRouter);
 import routes from './routes';
 
 const router = new VueRouter({
     mode: 'history',
     routes
 });
 // Routes End
 
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
  
 // Components
 Vue.component('pagination', require('laravel-vue-pagination'));
 Vue.component('dashboard', require('./components/Dashboard.vue'));
 
 Vue.component(
     'passport-clients',
     require('./components/passport/Clients.vue').default
 );
 
 Vue.component(
     'passport-authorized-clients',
     require('./components/passport/AuthorizedClients.vue').default
 );
 
 Vue.component(
     'passport-personal-access-tokens',
     require('./components/passport/PersonalAccessTokens.vue').default
 );
 
 Vue.component(
     'not-found',
     require('./components/NotFound.vue').default
 );
 
 // Filter Section
 
 Vue.filter('myDate',function(created){
     return moment(created).format('MMMM Do YYYY');
 });
 Vue.filter("formatNumber", function (value) {
    return numeral(value).format("0,0"); // displaying other groupings/separators is possible, look at the docs
  });
 Vue.filter('yesno', value => (value ? '<i class="fas fa-check green"></i>' : '<i class="fas fa-times red"></i>'));
 
 // end Filter
 
 Vue.component('example-component', require('./components/ExampleComponent.vue'));
 
 const app = new Vue({
     el: '#app',
     router
 });
 