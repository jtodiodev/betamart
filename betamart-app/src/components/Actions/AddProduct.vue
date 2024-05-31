<template>
    <Navbar />
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="w-100 max-w-md p-4 bg-white rounded shadow">

            <h2 class="text-center mb-4">ADD PRODUCT</h2>

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
                <button @click="closeForm" class="btn btn-secondary">
                    <router-link to="/marketplace" class="dropdown-item">Close</router-link>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from "@/components/NavBar.vue";

export default {
    components: {
        Navbar,
    },
    data() {
        return {
            productName: "",
            price: "",
        };
    },
    methods: {
        submitProduct() {
            // Prepare the data to be sent
            const productData = {
                productName: this.productName,
                price: this.price
            };

            // Make a POST request to the Laravel API endpoint
            fetch('http://localhost:8000/api/products', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${localStorage.getItem('token')}` // Add this line if using auth
                    // Add any additional headers if needed, like authorization token
                },
                body: JSON.stringify(productData)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to add product');
                    }
                    // If the request is successful, reset the form fields
                    this.productName = '';
                    this.price = '';
                    // Optionally, you can show a success message or redirect to another page
                    // For simplicity, let's assume the product gets added silently
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Handle error, show a message to the user, or log it
                });
        },

        closeForm() {
            // Logic to close the form
        },
    },
};
</script>

<style scoped>
/* Add custom styles here if needed */
</style>
