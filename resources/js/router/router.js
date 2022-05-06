import { createRouter, createWebHistory } from 'vue-router'

import App from '../components/App.vue'
import Master from '../components/Master.vue'

const routes = [
    {
        path: '/',
        component: App,
        children: [
            {
                name: 'home',
                path: '/',
                component: Master
            }
        ]
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router