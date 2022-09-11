import { createRouter, createWebHistory } from 'vue-router';
import Index from '../components/Index.vue'
import AddCompany from '../components/AddCompany.vue'
import EditCompany from '../components/EditCompany.vue'


const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path:'/',name:'Index',component:Index},
        {path:'/AddCompany',name:'AddCompany',component:AddCompany},
        {path:'/Company/EditCompany/:id?',name:'EditCompany',component:EditCompany},

    ]
})

export default router