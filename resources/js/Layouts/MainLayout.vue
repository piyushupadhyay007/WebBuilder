<template>
    <slot>Default</slot>
</template>

<script setup>
import { Link } from "@inertiajs/vue3"; 
import { ref } from "vue";

const refTime = ref(0);

setInterval(()=>refTime.value++,1000);
</script>
