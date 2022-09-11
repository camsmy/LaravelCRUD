import { createRouter, createWebHistory } from 'vue-router';
import Index from '../components/Index.vue'
import AddCompany from '../components/AddCompany.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path:'/',name:'Index',component:Index},
        {path:'/AddCompany',name:'AddCompany',component:AddCompany},
    ]
})

export default router