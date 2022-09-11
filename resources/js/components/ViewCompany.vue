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
                <a class="btn btn-info">Add New Product</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ViewCompany',
        data() {
            return {
                company: []
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
                           console.log(response.data[0])
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
