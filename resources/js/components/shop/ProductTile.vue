<template>
    <div class="flex flex-col md:flex-row mb-5 md:border md:border-4 bg-white md:rounded md:shadow p-4 justify-between">
        <img src="https://www.bikeinn.com/f/13646/136466095/msc-fat-bike-booty-r-26.jpg" width="200px" height="200px">
        <div class="md:w-1/3">
            <h4 class="mb-1 font-bold text-2xl text-orange-300">{{ product.name }}</h4>
            <hr>
            <div class="flex flex-col mt-4">
                <h4 class="text-md font-bold text-orange-300">Description:</h4>
                <h4 class="text-sm text-gray-600">{{ product.description }}</h4>
                <h4 class="text-sm text-gray-600">Includes third party insurance and lock</h4>
            </div>
        </div>
        <div class="md:w-1/4 mt-10 md:mt-0 flex flex-col md:border md:border-4 md:bg-white md:p-4 md:bg-orange-200">
            <h4 class="text-2xl text-right">{{ product.price }}€</h4>
            <span class="text-right text-gray-400 text-sm flex-1">For 3 days</span>
            <div class="text-right mt-5 md:mt-0">
                <input class="w-1/4 border-2 mb-1 text-center rounded" value="1" min="1" type="number">
            </div>
            <button class="btn-primary" @click="addToCart">Add to cart</button>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from 'vue'
    import { Component, Prop } from 'vue-property-decorator'
    import { ProductInterface } from './shop.interface';
    import axios from 'axios';

    @Component
    export default class ProductTile extends Vue {
        @Prop({ required: true, type: Object })
        protected product!: ProductInterface;

        protected async addToCart() {
            const response = await axios.post(`/ajax/cart/add-product`, this.product);
        }
    }
</script>
