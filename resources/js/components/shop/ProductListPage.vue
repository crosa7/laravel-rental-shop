<template>
    <div class="mt-10 flex flex-col md:flex-row justify-between">
        <div class="m-auto md:w-1/2 md:pr-10">
            <div class="flex flex-col md:flex-row border border-4 bg-white p-4 rounded shadow justify-between">
                <img src="https://www.bikeinn.com/f/13646/136466095/msc-fat-bike-booty-r-26.jpg" width="200px" height="200px">
                <div class="md:w-1/3">
                    <h4 class="mb-1 font-bold text-2xl text-orange-300">Ageece Alfa</h4>
                    <hr>
                    <div class="flex flex-col mt-4">
                        <h4 class="text-md font-bold text-orange-300">Description:</h4>
                        <h4 class="text-sm text-gray-600">Bike with 27 gears, wheel of size 27</h4>
                        <h4 class="text-sm text-gray-600">Includes third party insurance and lock</h4>
                    </div>
                </div>
                <div class="md:w-1/4 mt-10 md:mt-0 flex flex-col md:border md:border-4 md:bg-white md:p-4 md:bg-orange-200">
                    <h4 class="text-3xl text-right">20,50€</h4>
                    <span class="text-right text-gray-400 text-sm flex-1">For 3 days</span>
                    <button class="btn-primary mt-5 md:mt-0">Add to cart</button>
                </div>
            </div>
        </div>
        <div class="border border-orange-300 border-4 bg-white p-6 rounded right-0 shadow w-1/4">
            <h1>Cart</h1>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from 'vue'
    import Component from 'vue-class-component'

    @Component
    export default class ProductListPage extends Vue {

    }
</script>

<style lang="scss">
    .btn-primary {
        @apply
            bg-orange-300
            p-2
            transition ease-in duration-200;

        &:hover {
            @apply bg-orange-400;
        }
    }
</style>
