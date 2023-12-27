import './bootstrap';

import '../sass/app.scss';
import { createApp } from 'vue';
import { createPinia } from 'pinia'

import router from '@rideShare/router'
import App from '@rideShare/views/App.vue';


const app = document.querySelector('#app');
if (app) {
  // const app = createApp(App)

  // app.use(createPinia())
  // app.use(router)
  // app.mount(app)
  
  createApp(App).use(router).use(createPinia()).mount(app);
}