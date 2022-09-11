import './bootstrap';

import {createApp} from 'vue';
import { createRouter, createWebHistory } from 'vue-router';




import app from './App.vue'
import router from './routes/routes'



createApp(app).use(router).mount('#app')