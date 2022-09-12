import './bootstrap';

import {createApp} from 'vue'

import Table from './components/Table.vue'
import app from './components/Table.vue'

const apps = createApp(app)
apps.use(router)
apps.use(PrimeVue)
apps.component('Table',Table)
apps.mount('#app')