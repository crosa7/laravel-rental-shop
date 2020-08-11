import "./bootstrap"
import Vue from "vue"
import App from "./components/App.vue"

// Vue.component('app', App);

new Vue({
    components: {
        App,
    }
}).$mount('#app');
