import { createRouter, createWebHistory } from 'vue-router';
import Index from '../components/Index.vue'
import AddCompany from '../components/AddCompany.vue'
import EditCompany from '../components/EditCompany.vue'
import ViewCompany from '../components/ViewCompany.vue'


const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path:'/',name:'Index',component:Index},
        {path:'/AddCompany',name:'AddCompany',component:AddCompany},
        {path:'/Company/EditCompany/:id?',name:'EditCompany',component:EditCompany},
        {path:'/Company/ViewCompany/:id?',name:'ViewCompany',component:ViewCompany},
    ]
})

export default router