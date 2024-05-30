<template>
    <div>
      <Navbar />
  
      <div class="marketplace-container">
        <h1>Market Place</h1>
        <div class="header-actions">
          <input v-model="searchQuery" type="text" placeholder="Search products..." class="search-bar" />
        </div>
  
        <button class="btn btn-primary add-product-btn">
          <router-link to="/addproduct" class="dropdown-item">Add Product</router-link>
        </button>

  
        <div v-if="filteredProducts.length">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Author</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="product in filteredProducts" :key="product.id">
                <td>{{ product.name }}</td>
                <td>{{ product.price }}</td>
                <td>{{ product.author }}</td>
                <td>
                  <button class="btn btn-success btn-sm">
                    <router-link to="/viewproduct" class="dropdown-item">View</router-link>

                  </button>
                  &nbsp;
                  <button class="btn btn-warning btn-sm">
                    <router-link to="/editproduct" class="dropdown-item">Update</router-link>
                  </button>
                  &nbsp;
                  <button class="btn btn-danger btn-sm">
                    <router-link to="/deleteproduct" class="dropdown-item">Delete</router-link>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div v-else>
          <p>No products available.</p>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import Navbar from '@/components/NavBar.vue';
  
  export default {
    name: 'MarketPlace',
    components: {
      Navbar
    },
    data() {
      return {
        products: [
          { id: 1, name: 'Product 1', price: 100, author: 'Author 1' },
          { id: 2, name: 'Product 2', price: 200, author: 'Author 2' }
        ],
        searchQuery: '',
        showModal: false,
        selectedProduct: {}
      };
    },
    computed: {
      filteredProducts() {
        return this.products.filter(product =>
          product.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          product.author.toLowerCase().includes(this.searchQuery.toLowerCase())
        );
      }
    },
    methods: {
      viewProduct(product) {
        this.selectedProduct = product;
        this.showModal = true;
      },
      closeModal() {
        this.showModal = false;
      }
    }
  };
  </script>

<style scoped>
.marketplace-container {
    margin: 20px;
}

.header-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.search-bar {
    width: 100%;
    padding: 10px;
    margin-right: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.add-product-btn {
    margin-top: 10px;

}


.table {
    width: 100%;
    margin-bottom: 1rem;
    margin-top: 10px;
}

.table th,
.table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

.table tbody+tbody {
    border-top: 2px solid #dee2e6;
}

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
