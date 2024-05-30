// router/index.js
import { createRouter, createWebHistory } from "vue-router";
import LoginPage from "../components/LoginPage.vue";
import RegisterPage from "../components/RegisterPage.vue";
import HomePage from "../components/HomePage.vue";
import MarketPlace from "../components/MarketPlace.vue"; // Ensure the casing matches the file name
import AddProduct from "../components/Actions/AddProduct.vue"; // Ensure the casing matches the file name
import EditProduct from "../components/Actions/EditProduct.vue"; // Ensure the casing matches the file name
import DeleteProduct from "../components/Actions/DeleteProduct.vue"; // Ensure the casing matches the file name
import ViewProduct from "../components/Actions/ViewProduct.vue"; // Ensure the casing matches the file name




const routes = [
    { path: "/", component: LoginPage, name: "login" },
    { path: "/register", component: RegisterPage, name: "register" },
    {
        path: "/home",
        component: HomePage,
        name: "home",
        beforeEnter: (to, from, next) => {
            // check if user is logged in and redirect to login page if not
            if (localStorage.getItem("token")) {
                next();
            } else {
                next("/");
            }
        },
    },
    {
        path: "/marketplace",
        component: MarketPlace,
        name: "marketplace",
        beforeEnter: (to, from, next) => {
            if (localStorage.getItem("token")) {
                next();
            } else {
                next("/");
            }
        },
    },
    {
        path: "/addproduct",
        component: AddProduct,
        name: "addproduct",
        beforeEnter: (to, from, next) => {
            if (localStorage.getItem("token")) {
                next();
            } else {
                next("/");
            }
        },
    },
    {
        path: "/editproduct",
        component: EditProduct,
        name: "editproduct",
        beforeEnter: (to, from, next) => {
            if (localStorage.getItem("token")) {
                next();
            } else {
                next("/");
            }
        },
    },

    {
        path: "/deleteproduct",
        component: DeleteProduct,
        name: "deleteproduct",
        beforeEnter: (to, from, next) => {
            if (localStorage.getItem("token")) {
                next();
            } else {
                next("/");
            }
        },
    },

    {
        path: "/viewproduct",
        component: ViewProduct,
        name: "viewproduct",
        beforeEnter: (to, from, next) => {
            if (localStorage.getItem("token")) {
                next();
            } else {
                next("/");
            }
        },
    },
    {
        path: "/logout",
        name: "logout",
        component: LoginPage,
        beforeEnter: (to, from, next) => {
            console.log("logout");
            localStorage.removeItem("token");
            next("/");
        },
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
