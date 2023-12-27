import { createRouter, createWebHistory } from 'vue-router'

import App from '@rideShare/views/App.vue'
import Home from '@rideShare/views/Home.vue'
import Login from '@rideShare/views/Login.vue'
import Dashboard from '@rideShare/views/Dashboard.vue'
import DriverView from '@rideShare/views/DriverView.vue'
import PassengerView from '@rideShare/views/PassengerView.vue'

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
        },
        {
            name: 'dashboard',
            path: '/dashboard-user',
            component: Dashboard
        },
        {
            name: 'driver',
            path: '/driver',
            component: DriverView
        },
        {
            name: 'passenger',
            path: '/passenger',
            component: PassengerView
        },
    ]
})