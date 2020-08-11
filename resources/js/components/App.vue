<template>
    <div>
        <h1 class="text-red-400">Hello World</h1>
    </div>
</template>

<script lang="ts">
    import Vue from 'vue'
    import Component from 'vue-class-component'

    @Component
    export default class App extends Vue {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
