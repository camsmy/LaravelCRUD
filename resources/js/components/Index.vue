<template>
       <DataTable :value="company" responsiveLayout="scroll"
       :paginator="true" :rows="5"
       paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
            :rowsPerPageOptions="[5,10,20,50]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"


            v-model:selection="selectedCompany" dataKey="id" 
            :filters="filters"
            >


                <template #header>
                    <div class="table-header flex flex-column md:flex-row md:justiify-content-between">
						<span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText v-model="filters['global'].value" placeholder="Search..." />
                        </span>
					</div>
                </template>



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
                filters: {},
                selectedCompany:null,
            }
        },
        created(){
                this.getCompany(),
                this.initFilters();

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

            initFilters() {
            this.filters = {
                'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
            }
        },
        },
        mounted(){
            console.log("index is mounted")
        }
    }
</script>
