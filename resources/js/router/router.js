import { createRouter, createWebHashHistory } from 'vue-router'

import App from '../components/App.vue'
import Master from '../components/Master.vue'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'
import BookDetails from '../components/BookDetails.vue'
import Home from '../components/Home.vue'

const routes = [
    {
        path: '/',
        component: App,
        children: [
            {
                name: 'master',
                path: '/',
                component: Master,
                children: [
                    {
                        name: 'home',
                        path: '/home',
                        component: Home
                    },
                    {
                        name: 'book-details',
                        path: 'books/:id',
                        component: BookDetails
                    }

                ]
            },

        ]
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    }
]

const router = createRouter({
    history: createWebHashHistory(process.env.BASE_URL),
    routes
})

router.beforeEach((to, from) => {
    const token = localStorage.getItem('token')
        
    if(!token && to.name !== 'login' && to.name !== 'register')
        return { name : 'login' }
})

export default router