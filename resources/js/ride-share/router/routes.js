import { createRouter, createWebHistory } from 'vue-router'

import App from '@rideShare/views/App.vue'
import Home from '@rideShare/views/Home.vue'
import Login from '@rideShare/views/Login.vue'

export default createRouter({
    history: createWebHistory('/'),
    routes: [
        {
            name: 'home',
            path: '/',
            component: Home
        },
        {
            name: 'login',
            path: '/login',
            component: Login
        }
    ]
})