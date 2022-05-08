require('./bootstrap');

import { createApp } from 'vue'
import router from './router/router'

import App from './components/App.vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

axios.defaults.headers.common['Accept'] = 'application/json'
axios.defaults.headers.common['Authorization'] = localStorage.getItem('token')
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const app = createApp(App)
app.use(router)
app.use(VueAxios, axios)

app.mount("#app")