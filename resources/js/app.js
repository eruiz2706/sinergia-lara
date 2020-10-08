/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');
import VueSweetalert2 from 'vue-sweetalert2';
import Paginate from 'vuejs-paginate'
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import App from './App.vue';
import routes from './routes';


//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const router  = new VueRouter({
  routes
});

const store = new Vuex.Store({
  state: {
  },
  mutations: {
    
  }
});
  
//Vue.use(Vuex);
Vue.component('paginate', Paginate);
Vue.use(VueSweetalert2);
Vue.use(VueRouter);
//Vue.config.devtools = false
new Vue({
    store,
    router,
    render: h => h(App)
}).$mount('#app');

