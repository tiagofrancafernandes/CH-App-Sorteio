<script setup>
import { computed } from 'vue';

const props = defineProps({
    size: {
        type: String,
        required: false,
    }
})

const allowedSizes = {
    default: '7',
    sm: '5',
    md: '7',
    lg: '16',
    xl: '32',
    xxl: '64',
}

const computedSize = computed(() => {
    if (!props?.size) {
        return allowedSizes.default;
    }

    if (!isNaN(parseInt(props?.size ?? null))) {
        let numVal = parseInt(props?.size ?? null);

        if (numVal < 0 || numVal > 100) {
            return allowedSizes.default;
        }

        return numVal;
    }

    if (props?.size in allowedSizes) {
        return allowedSizes[`${props?.size}`] ?? allowedSizes.default;
    }

    return allowedSizes.default;
})
</script>

<template>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon" class="heroicons" :class="`w-${computedSize} h-${computedSize}`">
  <path fill-rule="evenodd" d="M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0ZM5.25 4.707a.75.75 0 0 1-.78-1.237c.841-.842 2.28-.246 2.28.944V6h5.5a.75.75 0 0 1 0 1.5h-5.5v3.098c0 .549.295.836.545.87a3.241 3.241 0 0 0 2.799-.966H9.75a.75.75 0 0 1 0-1.5h1.708a.75.75 0 0 1 .695 1.032 4.751 4.751 0 0 1-5.066 2.92c-1.266-.177-1.837-1.376-1.837-2.356V7.5h-1.5a.75.75 0 0 1 0-1.5h1.5V4.707Z" clip-rule="evenodd"></path>
</svg>

</template>
