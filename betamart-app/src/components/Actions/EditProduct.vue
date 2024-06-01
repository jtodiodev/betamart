<template>
    <h2 class="text-center mb-4">PRODUCT</h2>


    <div class="mb-3">
        <label for="product-name" class="form-label">Product Name:</label>
        <input type="text" id="product-name" v-model="productName" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="text" id="price" v-model="price" class="form-control" />
    </div>

    <div class="d-grid gap-2">
        <button @click="submitProduct" class="btn btn-primary">Submit</button>
        <router-link to="/marketplace" class="btn btn-primary">Close</router-link>
    </div>

</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            productId: null,
            productName: "",
            price: "",
        };
    },

    methods: {
        async fetchProduct() {
            try {
                const response = await axios.get(`${this.$root.$data.apiUrl}/products/${this.productId}`, {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`,
                    },
                });
                this.productName = response.data.productName;
                this.price = response.data.price;
            } catch (error) {
                console.error('Error fetching product:', error);
            }
        },

        async submitProduct() {
            try {
                this.$router.push('/marketplace');
                await axios.put(`${this.$root.$data.apiUrl}/products/${this.productId}`, {
                    productName: this.productName,
                    price: this.price,
                    
                }, 
                {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`,
                    },
                });
                
            } catch (error) {
                console.error('Error updating product:', error);
            }
        },
    },

    mounted() {
        this.productId = this.$route.params.id;
        if (this.productId) {
            this.fetchProduct();
        }
    },
};
</script>