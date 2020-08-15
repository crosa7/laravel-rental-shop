<template>
    <div class="border border-4 bg-white p-6 rounded md:fixed md:right-0 shadow md:w-1/5 md:mr-10 mb-5 md:mb-0">
        <div class="flex mb-2">
            <h1 class="text-2xl font-bold text-gray-600 flex-1">Order Summary</h1>
            <button class="inline md:invisible" @click="toggleCart()">
                <i v-if="isCartOpen" class="fa fa-chevron-up text-center pt-2"></i>
                <i v-if="!isCartOpen" class="fa fa-chevron-down text-center pt-2"></i>
            </button>
        </div>
        <hr v-if="isCartOpen">
        <div v-if="isCartOpen" class="flex flex-col mt-5">
            <h4 class="text-lg text-gray-600 font-bold">Items:</h4>
            <div class="flex mb-1">
                <h5 class="text-md w-1/12">3x</h5>
                <h5 class="text-md flex-1">Ageece alfa</h5>
                <h5 class="text-md text-right">60,50€</h5>
            </div>

            <div class="flex mb-1">
                <h5 class="text-md w-1/12">3x</h5>
                <h5 class="text-md flex-1">Ageece alfa</h5>
                <h5 class="text-md text-right">60,50€</h5>
            </div>
            <div class="flex mb-1">
                <h5 class="text-md w-1/12">3x</h5>
                <h5 class="text-md flex-1">Ageece alfa</h5>
                <h5 class="text-md text-right">60,50€</h5>
            </div>
            <div class="flex mb-1">
                <h5 class="text-md w-1/12">3x</h5>
                <h5 class="text-md flex-1">Ageece alfa</h5>
                <h5 class="text-md text-right">60,50€</h5>
            </div>
            <div class="flex mb-1">
                <h5 class="text-md w-1/12">3x</h5>
                <h5 class="text-md flex-1">Ageece alfa</h5>
                <h5 class="text-md text-right">60,50€</h5>
            </div>
            <hr class="mt-5">
            <div class="flex justify-between mt-5">
                <h4 class="text-lg text-gray-600 font-bold">Subtotal:</h4>
                <h4 class="text-lg font-bold">300,60€</h4>
            </div>
            <div class="flex justify-between mt-1 ml-2">
                <h4 class="text-lg text-gray-600 font-bold">Pay now:</h4>
                <h4 class="text-lg font-bold">100,60€</h4>
            </div>
            <div class="flex justify-between mt-1 ml-2">
                <h4 class="text-lg text-gray-600 font-bold">Pay on pick up:</h4>
                <h4 class="text-lg font-bold">200,60€</h4>
            </div>
            <button v-if="hasCheckoutButton" class="btn-primary mt-5">Proceed to checkout</button>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from 'vue'
    import { Component, Prop } from 'vue-property-decorator'

    @Component
    export default class Cart extends Vue {
        @Prop({ type: Boolean, default: true })
        protected hasCheckoutButton!: boolean;

        protected isCartOpen: boolean = true;

        protected toggleCart() {
            this.isCartOpen = !this.isCartOpen;
        }
    }
</script>
