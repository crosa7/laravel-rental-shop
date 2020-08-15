<template>
    <div class="mt-10 flex flex-col md:flex-row justify-between p-2">
        <cart></cart>
        <div class="md:m-auto md:w-1/2 md:pr-10">
            <div class="flex flex-col md:flex-row mb-5 md:border md:border-4 bg-white md:rounded md:shadow p-4 justify-between md:sticky md:top-0">
                <div class="flex items-end">
                    <label class="block">
                        <span class="text-orange-300">Pick-up date:</span>
                        <input class="block input-date" type="date" value="2017-06-01">
                    </label>
                    <div>
                        <select class="border-2 rounded p-1 ml-2 h-10">
                            <option>10:00</option>
                            <option>12:00</option>
                            <option>15:00</option>
                            <option>18:00</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-end mt-2 md:mt-0">
                    <label class="block">
                        <span class="text-orange-300">Return date:</span>
                        <input class="block input-date" type="date" value="2017-06-02">
                    </label>
                    <div>
                        <select class="border-2 rounded p-1 ml-2 h-10">
                            <option>10:00</option>
                            <option>12:00</option>
                            <option>15:00</option>
                            <option>18:00</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center mt-2 md:mt-0">
                    <button class="btn-primary md:w-20">Search</button>
                </div>
            </div>
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

        protected toggleCart() {
            this.isCartOpen = !this.isCartOpen;
        }
    }
</script>
