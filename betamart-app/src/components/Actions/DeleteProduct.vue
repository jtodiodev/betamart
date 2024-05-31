<template>
    <Navbar />

    <div class="warning-container">
        <p class="warning-message">Are you sure you want to delete this product?</p>
        <div class="warning-buttons">
            <button @click="deleteProduct" class="yes-button">Yes</button>
            <button class="no-button">
                <router-link to="/marketplace" class="dropdown-item">No</router-link>
            </button>
        </div>
    </div>
</template>

<script>
import Navbar from "@/components/NavBar.vue";
import axios from 'axios';

export default {
    components: {
        Navbar,
    },
    data() {
        return {
            productId: null,
            productName: "",
            price: "",
        };
    },
    methods: {
        async deleteProduct() {
            try {
                // Perform deletion logic here
                await axios.delete(`${this.$root.$data.apiUrl}/products/${this.productId}`, {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`,
                    },
                });
                // Redirect back to the marketplace after deletion
                this.$router.push('/marketplace');
            } catch (error) {
                console.error('Error deleting product:', error);
            }
        },
    },
    mounted() {
        // Fetch the product ID from the route params
        this.productId = this.$route.params.id;
    }
};
</script>

<style scoped>
.warning-container {
    border: 1px solid #ffcc00;
    background-color: #fff3cd;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    margin: 20px;
}

.warning-message {
    font-size: 16px;
    font-weight: bold;
    color: #856404;
    margin-bottom: 20px;
}

.warning-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.yes-button {
    background-color: red;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.no-button {
    background-color: green;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.yes-button:hover,
.no-button:hover {
    opacity: 0.8;
}
</style>
