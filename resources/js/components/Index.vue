<template>
    
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Company Name</th>
                <th>Company Email</th>
                <th>Company Address</th>
                <th width="280px">Action</th>
            </tr>
            <tbody v-for="companies in company" :key="companies.id">
                <tr class="table-active">
                    <th scope="row">{{companies.id}}</th>
                    <td>{{companies.name}}</td>
                    <td>{{companies.email}}</td>
                    <td>{{companies.address}}</td>
                    <td>
                        <router-link class="btn btn-primary"
                        :to="{name:'EditCompany', params:{id:companies.id}}">Edit</router-link>
                        <router-link class="btn btn-secondary"
                        :to="{name:'ViewCompany', params:{id:companies.id}}">View</router-link>
                        <button type="submit" class="btn btn-danger"
                        @click.prevent="delete_company(companies.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

       <DataTable :value="company" responsiveLayout="scroll"
       :paginator="true" :rows="5"
       paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
            :rowsPerPageOptions="[10,20,50]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
            >
            <Column field="id" header="S.No"
            >
            </Column>
            <Column field="name" header="Company Name"
            filterMatchMode="contains"
            ></Column>
            <Column field="email" header="Company Email"
            filterMatchMode="contains"
            ></Column>
            <Column field="address" header="Company Address"
            filterMatchMode="contains"
            ></Column>
            <Column field="id" header="Actions">
            <template #body="slotProps">
                <router-link class="btn btn-secondary"
                        :to="{name:'ViewCompany', params:{id:slotProps.data.id}}">View</router-link>
                <router-link class="btn btn-primary"
                        :to="{name:'EditCompany', params:{id:slotProps.data.id}}">Edit</router-link>
                 <Button label="Delete" class="p-button-danger"
                @click.prevent="delete_company(slotProps.data.id)" />
            </template>
            </Column>
            <template #empty>
                No customers found.
            </template>
        </DataTable>

</template>

<script>
import { FilterMatchMode } from 'primevue/api';
import axios from 'axios'

    export default {
        name: 'Index',
        
        data(){
            return{
                company:[],
                filters1: {},
                selectedCustomer1:null,
            }
        },
        created(){
                this.getCompany(),
                this.initFilters1();

        },
        methods:{
            async getCompany(){
               let url='http://127.0.0.1:8000/api/index'
                try{
                    await axios.get(url).then(response=>{
                        this.company = response.data.company
                    })
                }catch(error){
                    console.log(`error:  ${error}`)
                }
            },

            async delete_company(id){
                let url = `http://127.0.0.1:8000/api/delete_company/${id}`
                try{
                    await axios.delete(url).then(response=>{
                        if(response.data.code===200){
                            // console.log(response.data.message)
                            alert(response.data.message)
                            this.getCompany()
                        }else{
                            console.log('wrong id tatement')
                        }
                    })
                }catch(error){
                    console.log(`error:  ${error}`)
                }
            },

            initFilters1() {
            this.filters1 = {
                'global': {value: null, matchMode: FilterMatchMode.CONTAINS}
            }
        },
        },
        mounted(){
            console.log("index is mounted")
        }
    }
</script>
