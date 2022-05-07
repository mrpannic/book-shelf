require('./bootstrap');

import { createApp } from 'vue'
import router from './router/router'

import App from './components/App.vue'
import axios from 'axios'

axios.defaults.headers.common['Accept'] = 'application/json'
axios.defaults.headers.common['Authentication'] = localStorage.getItem('token')

const app = createApp(App)
app.use(router)
app.config.globalProperties.$http = axios
app.mount("#app")