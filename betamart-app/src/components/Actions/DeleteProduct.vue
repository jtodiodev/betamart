<template>
    <div class="modal">
      <div class="modal-content">
        <div class="warning-container">
          <p class="warning-message">Are you sure you want to delete this product?</p>
          <div class="warning-buttons">
            <button @click="deleteProduct1" class="yes-button">Yes</button>
            <button @click="cancelDelete" class="no-button">No</button>
          </div>
        </div>
      </div>
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
        async deleteProduct1() {
      try {
        await axios.delete(`${this.$root.$data.apiUrl}/products/${this.productId}`, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`,
          },
        });
        // No need to redirect here
      } catch (error) {
        console.error('Error deleting product:', error);
      }
      // Redirect back to the marketplace after deletion
      this.$router.push('/marketplace');
    },
      cancelDelete() {
        // Redirect back to the marketplace without deleting
        this.$router.push('/marketplace');
      },
    },
    mounted() {
      // Fetch the product ID from the route params
      this.productId = this.$route.params.id;
    },
  };
  </script>
  
  <style scoped>
  .modal {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
  }
  
  .modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
  }
  
  .warning-container {
    text-align: center;
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
  
  .yes-button,
  .no-button {
    background-color: #007bff;
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
  