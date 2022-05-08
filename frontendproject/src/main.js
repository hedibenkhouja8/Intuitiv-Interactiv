import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import 'bootstrap'
import "bootstrap/dist/css/bootstrap.min.css"
createApp(App).use(router).mount('#app')
import Vue from 'vue'
import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);
import Toaster from 'v-toaster'
import axios from 'axios'
// You need a specific loader for CSS files like https://github.com/webpack/css-loader
import 'v-toaster/dist/v-toaster.css'
 
// optional set default imeout, the default is 10000 (10 seconds).
Vue.use(Toaster, {timeout: 5000})

axios.defaults.headers.common['Authorization']='Bearer ' + localStorage.getItem('token')