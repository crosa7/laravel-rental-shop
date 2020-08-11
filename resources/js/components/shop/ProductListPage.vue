<template>
    <div class="mt-10 flex flex-col md:flex-row justify-between p-2">
        <cart></cart>
        <div class="m-auto md:w-1/2 md:pr-10">
            <product-tile></product-tile>
            <product-tile></product-tile>
            <product-tile></product-tile>
            <product-tile></product-tile>
            <product-tile></product-tile>
            <product-tile></product-tile>
            <product-tile></product-tile>
            <product-tile></product-tile>
            <product-tile></product-tile>
            <product-tile></product-tile>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from 'vue'
    import Component from 'vue-class-component'
    import ProductTile from "./ProductTile.vue";
    import Cart from "./Cart.vue";

    @Component({
        components: {
            Cart,
            ProductTile
        }
    })
    export default class ProductListPage extends Vue {

        protected isCartOpen: boolean = true;

        protected toggleCart()
        {
            this.isCartOpen = !this.isCartOpen;
        }
    }
</script>
