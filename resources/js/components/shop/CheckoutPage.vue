<template>
    <div class="mt-10 flex flex-col md:flex-row justify-between p-2">
        <cart :has-checkout-button="false"></cart>
        <div class="md:m-auto md:w-1/3 flex flex-col md:flex-row mb-5 md:border md:border-4 bg-white md:rounded md:shadow p-6">
            <form class="w-full" name="checkout_form" method="post" @submit.prevent="submit">
                <div class="w-full">
                    <div class="input-group">
                        <label class="block">
                            Email:
                            <input class="block w-full" v-model="checkoutForm.email" @keydown="clearError('email')" id="email" type="email">
                            <span v-if="errors.email" class="text-red-400">{{ errors.email[0] }}</span>
                        </label>
                    </div>
                    <div class="input-group">
                        <label class="block">
                            Name:
                            <input class="block w-full" v-model="checkoutForm.name" @keydown="clearError('name')" id="name" type="text">
                            <span v-if="errors.name" class="text-red-400">{{ errors.name[0] }}</span>
                        </label>
                    </div>
                    <div class="input-group">
                        <label class="block">
                            Date of birth:
                            <input class="block w-full" v-model="checkoutForm.dateOfBirth" @change="clearError('dateOfBirth')" id="dateOfBirth" type="date">
                            <span v-if="errors.dateOfBirth" class="text-red-400">{{ errors.dateOfBirth[0] }}</span>
                        </label>
                    </div>
                    <div class="input-group">
                        <label class="block">
                            Country:
                            <input class="block w-full" v-model="checkoutForm.country" @keydown="clearError('country')" id="country" type="text">
                            <span v-if="errors.country" class="text-red-400">{{ errors.country[0] }}</span>
                        </label>
                    </div>
                    <div class="input-group">
                        <label class="block">
                            Postal Code:
                            <input class="block w-full" v-model="checkoutForm.zipCode" @keydown="clearError('zipCode')" id="zipCode" type="text">
                            <span v-if="errors.zipCode" class="text-red-400">{{ errors.zipCode[0] }}</span>
                        </label>
                    </div>
                    <div class="input-group">
                        <label class="block">
                            Home address:
                            <input class="block w-full" v-model="checkoutForm.address" @keydown="clearError('address')" id="address" type="text">
                            <span v-if="errors.address" class="text-red-400">{{ errors.address[0] }}</span>
                        </label>
                    </div>
                    <div class="input-group">
                        <label class="block">
                            Phone number:
                            <input class="block w-full" v-model="checkoutForm.phone" @keydown="clearError('phone')" id="phone" type="text">
                            <span v-if="errors.phone" class="text-red-400">{{ errors.phone[0] }}</span>
                        </label>
                    </div>
                    <div class="input-group">
                        <label class="block">
                            Additional Info:
                            <textarea class="block w-full" v-model="checkoutForm.info" type="text"></textarea>
                        </label>
                    </div>

                    <div class="flex justify-end">
                        <button class="btn-secondary mr-4" type="button" @click="resetForm()">Reset</button>
                        <button class="btn-primary" type="submit">Confirm and Pay</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from 'vue'
    import Component from 'vue-class-component'
    import Cart from "./Cart.vue";
    import { CheckoutForm } from "../../models/CheckoutForm";

    @Component({
        components: {
            Cart,
        }
    })
    export default class CheckoutPage extends Vue {

        protected isCartOpen: boolean = true;

        protected toggleCart() {
            this.isCartOpen = !this.isCartOpen;
        }

        protected checkoutForm: CheckoutForm = new CheckoutForm();

        protected errors: object = {};

        protected async submit() {
            const errors = this.validateData();
            if (Object.keys(errors).length !== 0) {
                this.errors = errors;
                return;
            }

            this.checkoutForm = new CheckoutForm();
        }

        protected validateData() {
            const errors = {};
            Object.keys(this.checkoutForm).forEach((key) => {
                if ((this.checkoutForm as any)[key] === '') {
                    (errors as any)[key] = ['This field cannot be empty'];
                }
            });

            return errors;
        }

        protected clearError(fieldName: string) {
            (this.errors as any)['_' + fieldName] = [];
        }

        protected resetForm() {
            this.checkoutForm = new CheckoutForm();
            this.errors = {};
        }
    }
</script>
<style>
    .input-group {
        @apply mb-5
    }
</style>
