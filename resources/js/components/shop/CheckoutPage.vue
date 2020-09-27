<template>
    <div class="mt-10 flex flex-col md:flex-row justify-between p-2">
        <cart :cart="cart" :has-checkout-button="false"></cart>
        <div class="md:m-auto md:w-1/2 flex flex-col md:flex-row mb-5">
            <form class="w-full" name="checkout_form" method="post" @submit.prevent="submit">
                <div class="w-full">
                    <div class="md:border md:border-4 bg-white md:rounded md:shadow p-6">
                        <div class="flex items-center mb-4">
                            <div class="inline-flex w-10 h-10 border-2 rounded-full items-center justify-center bg-white mr-2">1</div>
                            <div>Contact Info</div>
                        </div>
                        <div class="md:flex">
                            <label class="mb-5 block md:w-1/2">
                                <span class="input-label">Name:*</span>
                                <input class="block w-full" v-model="checkoutForm.name" @keydown="clearError('name')"
                                       id="name" type="text">
                                <span v-if="errors.name" class="text-red-400">{{ errors.name[0] }}</span>
                            </label>
                            <label class="mb-5 block md:w-1/2 md:ml-4">
                                <span class="input-label">Phone number:*</span>
                                <input class="block w-full" v-model="checkoutForm.phone" @keydown="clearError('phone')"
                                       id="phone" type="text">
                                <span v-if="errors.phone" class="text-red-400">{{ errors.phone[0] }}</span>
                            </label>
                        </div>
                        <div class="md:flex">
                            <label class="mb-5 block md:w-1/2">
                                <span class="input-label">Email:*</span>
                                <input class="border-2 block w-full" v-model="checkoutForm.email"
                                       @keydown="clearError('email')"
                                       id="email" type="email">
                                <span v-if="errors.email" class="text-red-400">{{ errors.email[0] }}</span>
                            </label>
                            <label class="mb-5 block md:w-1/2 md:ml-4">
                                <span class="input-label">Date of birth:</span>
                                <input class="block w-full" v-model="checkoutForm.dateOfBirth"
                                       @change="clearError('dateOfBirth')" id="dateOfBirth" type="date">
                                <span v-if="errors.dateOfBirth" class="text-red-400">{{ errors.dateOfBirth[0] }}</span>
                            </label>
                        </div>
                        <div class="md:flex">
                            <label class="mb-5 block md:w-1/2">
                                <span class="input-label">Country:*</span>
                                <input class="block w-full" v-model="checkoutForm.country"
                                       @keydown="clearError('country')"
                                       id="country" type="text">
                                <span v-if="errors.country" class="text-red-400">{{ errors.country[0] }}</span>
                            </label>
                            <label class="mb-5 block md:w-1/2 md:ml-4">
                                <span class="input-label">Postal Code:</span>
                                <input class="block w-full" v-model="checkoutForm.zipCode"
                                       @keydown="clearError('zipCode')"
                                       id="zipCode" type="text">
                                <span v-if="errors.zipCode" class="text-red-400">{{ errors.zipCode[0] }}</span>
                            </label>
                        </div>
                        <div class="mb-5">
                            <label class="block">
                                <span class="input-label">Home address:</span>
                                <input class="block w-full" v-model="checkoutForm.address"
                                       @keydown="clearError('address')"
                                       id="address" type="text">
                                <span v-if="errors.address" class="text-red-400">{{ errors.address[0] }}</span>
                            </label>
                        </div>
                    </div>

                    <div class="md:border md:border-4 bg-white md:rounded md:shadow p-6 mt-4">
                        <div class="flex items-center mb-4">
                            <div class="inline-flex w-10 h-10 border-2 rounded-full items-center justify-center bg-white mr-2">2</div>
                            <div>Bike sizing Info</div>
                        </div>
                        <div class="mb-5">
                            <label class="block">
                                <div class="border-2 p-4 rounded">
                                    <div v-for="count in 5"
                                         class="flex flex-col md:flex-row md:w-1/2 justify-between mb-2">
                                        <label class="block mb-2 md:mb-0 w-full">
                                            <span>Gender:</span>
                                            <select class="border-2 rounded p-1 block h-10 w-full">
                                                <option disabled selected>Select one</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </label>
                                        <label class="block w-full md:ml-4">
                                            <span>Height(cm):</span>
                                            <input class="block h-10 w-full" type="text">
                                        </label>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="md:border md:border-4 bg-white md:rounded md:shadow p-6 mt-4">
                        <div class="flex items-center mb-4">
                            <div class="inline-flex w-10 h-10 border-2 rounded-full items-center justify-center bg-white mr-2">3</div>
                            <div>Payment Info</div>
                        </div>
                        <div class="mb-5">
                            <label>
                                <span class="input-label">Payment Method:*</span>
                                <div>
                                    <div class="border-2 rounded p-5 bg-gray-200">
                                        <label>
                                            <input type="radio" name="paymentRadio" value="paypal"
                                                   v-model="checkoutForm.paymentMethod">
                                            <span>
                                            <i class="fa fa-cc-paypal mr-1"></i>
                                            Paypal
                                        </span>
                                        </label>
                                    </div>
                                    <div class="border-2 rounded p-5 bg-gray-200 mt-2">
                                        <label>
                                            <input type="radio" name="paymentRadio" value="visa"
                                                   v-model="checkoutForm.paymentMethod">
                                            <span class="">
                                            <i class="fa fa-cc-visa mr-1"></i>
                                            Credit Card
                                        </span>
                                        </label>
                                    </div>
                                </div>
                            </label>
                            <span v-if="errors.paymentMethod" class="text-red-400">{{ errors.paymentMethod[0] }}</span>
                        </div>
                    </div>

                    <div class="flex justify-between mt-4">
                        <button class="btn-secondary w-1/2 mr-4" type="button" @click="resetForm()">Cancel</button>
                        <button class="btn-primary w-1/2" type="submit">Confirm and Pay</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from 'vue'
    import Cart from "./Cart.vue";
    import { CheckoutForm } from "../../models/CheckoutForm";
    import { Component, Prop } from "vue-property-decorator";

    @Component({
        components: {
            Cart,
        }
    })
    export default class CheckoutPage extends Vue {
        @Prop({ type: Object, required: true})
        protected cart!: any;

        protected isCartOpen: boolean = true;

        protected requiredFields: string[] = ['email', 'name', 'country', 'phone', 'paymentMethod'];

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

            // Do something

            this.checkoutForm = new CheckoutForm();
        }

        protected validateData() {
            const errors = {};
            Object.keys(this.checkoutForm).forEach((key) => {
                if ((this.checkoutForm as any)[key] === '' && this.requiredFields.includes(key)) {
                    (errors as any)[key] = ['This field cannot be empty'];
                }
            });

            return errors;
        }

        protected clearError(fieldName: string) {
            (this.errors as any)[fieldName] = [];
        }

        protected resetForm() {
            this.checkoutForm = new CheckoutForm();
            this.errors = {};
        }
    }
</script>
<style>
    .input-label {
        @apply font-bold;
    }
</style>
