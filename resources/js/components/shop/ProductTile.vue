<template>
    <div class="flex flex-col md:flex-row mb-5 md:border md:border-4 bg-white md:rounded md:shadow p-4 justify-between">
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
            <h4 class="text-2xl text-right">20,50€</h4>
            <span class="text-right text-gray-400 text-sm flex-1">For 3 days</span>
            <div class="text-right mt-5 md:mt-0">
                <input class="w-1/4 border-2 mb-1 text-center rounded" value="1" min="1" type="number">
            </div>
            <button class="btn-primary">Add to cart</button>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from 'vue'
    import Component from 'vue-class-component'

    @Component
    export default class ProductTile extends Vue {

    }
</script>
