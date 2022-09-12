<template>
    <div class="container mt-2">
        <div class="text-center">
            <div class="card-header">
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li v-for="movie in company " :key="movie" class="mb-2">
                        <h5 class="card-title">{{ movie.products }}</h5>
                        <p class="card-text">{{ movie.prod_desc }}</p>

                    </li>
                </ul>
            </div>
            <div class="card-footer">
                  <router-link class="btn btn-info"
                        :to="{name:'NewProduct', params:{id:company_id}}">
                        Add New Product</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ViewCompany',
        data() {
            return {
                company: [],
                company_id:Number
            }
        },
        created() {
            this.getProducts()
        },
        methods: {
            async getProducts() {
                let url = `http://127.0.0.1:8000/api/ViewCompany/${this.$route.params.id}`
                try {
                    await axios.get(url).then(response => {
                           console.log(response.data.company_id)
                           this.company_id = response.data.company_id
                            this.company = response.data[0]
                    })
                } catch (error) {
                    console.log(`error:  ${error}`)
                }
            }
        },
        mounted() {
            console.log("Products is mounted")
        }
    }
</script>
