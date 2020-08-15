import "./bootstrap"
import Vue from "vue"
import App from "./components/App.vue"
import ProductListPage from "./components/shop/ProductListPage.vue"
import CheckoutPage from "./components/shop/CheckoutPage.vue"

// Vue.component('app', App);

new Vue({
    components: {
        App,
        ProductListPage,
        CheckoutPage
    }
}).$mount('#app');
