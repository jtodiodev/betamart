<template>
    <Navbar />

    <div class="warning-container">
        <p class="warning-message">Are you sure you want to delete this product?</p>
        <div class="warning-buttons">
            <button class="yes-button">Yes</button>
            <button class="no-button">
                <router-link to="/marketplace" class="dropdown-item">No</router-link>
            </button>
        </div>
    </div>
</template>

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
            // Logic to submit product data
        },
    },
};
</script>