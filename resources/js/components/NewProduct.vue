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
    <form @submit.prevent="saveProduct" novalidate>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="company_id" class="form-control" value="{{ company_id }}" hidden>
                    <input type="text" name="products" class="form-control" placeholder="Product Name"
                    v-model="product.name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="prod_desc" class="form-control" placeholder="Description"
                    v-model="product.prod_desc">
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</template>
<script>
    import axios from 'axios'
    export default {
        name: 'NewProduct',
        data() {
            return {
                company_id:Number,
                product:{},
                name:String,
                email:String,
                address:String,
                errors:[]
            }
        },
        created() {
            this.getProducts()
        },
        methods: {
            async getProducts() {
                let url = `http://127.0.0.1:8000/api/ViewCompany/${this.$route.params.id}/NewProduct`
                try {
                    await axios.get(url).then(response => {
                        console.log(this.company_id = response.data.company_id)
                        this.company_id = response.data.company_id
                    })
                } catch (error) {
                    console.log(`error:  ${error}`)
                }
            },

             async saveProduct(){
                    this.errors = []
                    // if this.contact name is empty push
                    // the message to the array
                    if(!this.product.name){
                        this.errors.push("Product Name is required")
                    }
                    if(!this.product.prod_desc){
                        this.errors.push("Product Description is required")
                    }
                    //if the array error is empty 
                    if(!this.errors.length){
                        let formData = new FormData();
                        formData.append('company_id',this.company_id)
                        formData.append('products',this.product.name)
                        formData.append('prod_desc',this.product.prod_desc)
                        let url = `http://127.0.0.1:8000/api/NewProduct/${this.$route.params.id}/store`
                        // post request via axios
                        try{
                            await axios.post(url,formData).then((response)=>{
                            console.log(response);
                            if(response.status === 200){
                                this.$router.push(`/Company/ViewCompany/${this.$route.params.id}`)
                            }else{
                             console.log(`error when sublit:  ${error}`)
                            }
                        })
                        }catch(error){
                            this.errors.push(error.response)
                        }
                    }
                }
        },
        mounted(){
            console.log("product is mounted")
        }
    }
</script>
