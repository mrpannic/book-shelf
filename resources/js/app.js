require('./bootstrap');

import { createApp } from 'vue'
import router from './router/router'

import App from './components/App.vue'
import axios from 'axios'

axios.defaults.headers.common['Accept'] = 'application/json'
axios.defaults.headers.common['Authentication'] = localStorage.getItem('token')
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('input[name="_token"]').value

const app = createApp(App)
app.use(router)
window.axios = axios
app.mount("#app")