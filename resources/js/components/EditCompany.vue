<template>
    <div class="col-md-6">
        <div class="alert alert-danger m-3" v-if="errors.length > 0">
            <ul class="mb-0">
                <li v-for="(error, index) in errors" :key="index">
                    {{ error }}
                </li>
            </ul>
        </div>
    </div>
        <form @submit.prevent="updateCompany" novalidate>
            <fieldset>
            <h5 class="text-center">You're editing company ID no. {{ company.id }}</h5>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Company Name"
                         v-model="company.name" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Company Email"
                         v-model="company.email">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Address:</strong>
                        <input type="text" name="address" class="form-control" placeholder="Company Address"
                         v-model="company.address">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
            </fieldset>
        </form>
</template>
<script>
import axios from 'axios'
    export default {
        name: 'EditCompany',
        data(){
            return{
                company:{},
                name:String,
                email:String,
                address:String,
                errors:[]
            }
        },
        created(){
            this.getCompany()
        },
          methods:{
                async getCompany(){
                     let url = `http://127.0.0.1:8000/api/EditCompany/${this.$route.params.id}`
 
                    try{
                        await axios.get(url).then(response=>{
                            console.log(response.data[0])
                            this.company = response.data[0]
                        })
                    }catch(error){
                    console.log(`error:  ${error}`)
                }
                },

                async updateCompany(){
                    this.errors = []
                    // if this.company name is empty push
                    // the message to the array
                    if(!this.company.name){
                        this.errors.push("Name is required")
                    }
                    if(!this.company.email){
                        this.errors.push("Email is required")
                    }
                    if(!this.company.address){
                        this.errors.push("Designation is required")
                    }

                    //if the array error is empty 
                    if(!this.errors.length){
                        let formData = new FormData();
                        formData.append('name',this.company.name)
                        formData.append('email',this.company.email)
                        formData.append('address',this.company.address)
                        let url = `http://127.0.0.1:8000/api/updateCompany/${this.$route.params.id}`
                        // post request via axios
                        try{
                            await axios.post(url,formData).then((response)=>{
                            console.log(response);
                            if(response.status === 200){
                                // edit this to rerouting to the main page
                                // while passing a message of success
                                alert(response.data.message)
                                this.$router.push('/')
                          }else{
                                console.log('error')
                            }
                        })
                        }catch(error){
                            this.errors.push(error.response)
                        }
                    }
                }
                
        },
        mounted: function(){
            console.log('edit component form')
        }
    }

</script>
