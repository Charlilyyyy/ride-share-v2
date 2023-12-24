import './bootstrap';

import '../sass/app.scss';
import { createApp } from 'vue';

import router from '@rideShare/router'
import App from '@rideShare/views/App.vue';


const app = document.querySelector('#app');
if (app) {
  createApp(App).use(router).mount(app);
}