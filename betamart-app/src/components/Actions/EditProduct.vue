<template>
  <Navbar />
  <div class="container d-flex justify-content-center align-items-center vh-100">
      <div class="w-100 max-w-md p-4 bg-white rounded shadow">
          <h2 class="text-center mb-4">UPDATE PRODUCT</h2>

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
              <button @click="closeForm" class="btn btn-secondary">Close</button>
          </div>
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
      async fetchProduct() {
          try {
              // Fetch the product details based on the ID from the route params
              const response = await axios.get(`${this.$root.$data.apiUrl}/products/${this.productId}`, {
                  headers: {
                      Authorization: `Bearer ${localStorage.getItem('token')}`,
                  },
              });
              // Populate the input fields with the fetched product data
              this.productName = response.data.productName;
              this.price = response.data.price;
          } catch (error) {
              console.error('Error fetching product:', error);
          }
      },
      async submitProduct() {
          try {
              // Logic to submit updated product data
              await axios.put(`${this.$root.$data.apiUrl}/products/${this.productId}`, {
                  productName: this.productName,
                  price: this.price,
              }, {
                  headers: {
                      Authorization: `Bearer ${localStorage.getItem('token')}`,
                  },
              });
              // Navigate back to the marketplace after submission
              this.$router.push('/marketplace');
          } catch (error) {
              console.error('Error updating product:', error);
          }
      },
      closeForm() {
          // Logic to close the form
      },
  },
  mounted() {
      // Fetch the product ID from the route params
      this.productId = this.$route.params.id;
      // Fetch the product details based on the ID
      this.fetchProduct();
  }
};
</script>

<style scoped>
/* Add custom styles here if needed */
</style>
