<template>
    <Navbar />
    <div class="container d-flex justify-content-center align-items-center vh-100">
      <div class="w-100 max-w-md p-4 bg-white rounded shadow">
        
        <h2 class="text-center mb-4">EDIT PRODUCT</h2>
  
        <div class="mb-3">
          <label for="product-name" class="form-label">Product Name:</label>
          <input type="text" id="product-name" v-model="productName" class="form-control" readonly/>
        </div>
  
        <div class="mb-3">
          <label for="price" class="form-label">Price:</label>
          <input type="text" id="price" v-model="price" class="form-control" readonly>
        </div>

        <div class="mb-3">
          <label for="price" class="form-label">Description:</label>
          <input type="text" id="price" v-model="price" class="form-control" readonly>
        </div>
  
        <div class="d-grid gap-2">
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
        // Logic to submit product data
      },
      closeForm() {
        // Logic to close the form
      },
    },
  };
  </script>
  