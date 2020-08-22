<template>
    <div class="mt-10 flex flex-col md:flex-row justify-between p-2">
        <cart :cart="cart"></cart>
        <div class="md:m-auto md:w-1/2 md:pr-10">
            <div class="flex flex-col md:flex-row mb-5 md:border md:border-4 bg-white md:rounded md:shadow p-4 justify-between md:sticky md:top-0">
                <div class="flex items-end">
                    <label class="block">
                        <span class="text-orange-300">Pick-up date:</span>
                        <input :value="startDate" @input="startDate = getFormattedDate($event.target.valueAsDate)" class="block input-date" type="date">
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
                        <input :value="endDate" @input="endDate = getFormattedDate($event.target.valueAsDate)" class="block input-date" type="date">
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
                    <button class="btn-primary md:w-20" @click="getProductListByDate()">Search</button>
                </div>
            </div>
            <product-tile
                v-for="(product, index) in products"
                :key="index"
                :product="product"
            >
            </product-tile>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from 'vue'
    import { Component, Prop } from 'vue-property-decorator'
    import ProductTile from './ProductTile.vue';
    import Cart from './Cart.vue';
    import { ProductInterface } from './shop.interface';
    import axios from 'axios';
    import { getCurrentDate, getFormattedDate } from '../../helpers/date-helper';

    @Component({
        components: {
            Cart,
            ProductTile
        }
    })
    export default class ProductListPage extends Vue {
        @Prop({ type: Object, default: null })
        protected cart!: any;

        protected products: ProductInterface[] = [];

        protected startDate: string = getCurrentDate();

        protected endDate: string = getCurrentDate(true);

        protected isCartOpen: boolean = true;

        protected toggleCart() {
            this.isCartOpen = !this.isCartOpen;
        }

        protected getFormattedDate(date: any) {
            return getFormattedDate(date);
        }

        protected async getProductListByDate() {
            if (this.startDate > this.endDate) {
                // TODO disable dates that are before start date when new date picker is implemented
                console.log('start date cant be lower than end date')
            }
            const response = await axios.get(`/ajax/product-list?start=${this.startDate}&end=${this.endDate}`);
            this.products = response.data;
        }

        protected async created() {
            this.getProductListByDate();
        }
    }
</script>
