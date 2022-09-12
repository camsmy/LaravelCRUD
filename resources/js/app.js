import './bootstrap';

import {createApp} from 'vue';


import app from './App.vue'
import router from './routes/routes'

import PrimeVue from 'primevue/config';

import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';



import 'primevue/resources/themes/saga-blue/theme.css'      //theme
import 'primevue/resources/primevue.min.css'                 //core css
import 'primeicons/primeicons.css'                           //icons

const apps = createApp(app)
apps.use(router)
apps.use(PrimeVue)
apps.component('DataTable',DataTable)
apps.component('Column',Column)
apps.component('InputText',InputText)
apps.component('Button',Button)
apps.mount('#app')