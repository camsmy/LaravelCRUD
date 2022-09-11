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
                        :to="{name:'AddCompany', params:{id:companies.id}}">Edit</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
</template>

<script>
import axios from 'axios'
    export default {
        name: 'Index',
        
        data(){
            return{
                company:[]
            }
        },
        created(){
                this.getCompany()
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
            }
        },
        mounted(){
            console.log("index is mounted")
        }
    }
</script>
