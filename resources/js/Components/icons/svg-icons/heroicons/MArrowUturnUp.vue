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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="heroicons" :class="`w-${computedSize} h-${computedSize}`">
  <path fill-rule="evenodd" d="M17.768 7.793a.75.75 0 0 1-1.06-.025L12.75 3.622v10.003a5.375 5.375 0 0 1-10.75 0V10.75a.75.75 0 0 1 1.5 0v2.875a3.875 3.875 0 0 0 7.75 0V3.622L7.293 7.768a.75.75 0 0 1-1.086-1.036l5.25-5.5a.75.75 0 0 1 1.085 0l5.25 5.5a.75.75 0 0 1-.024 1.06Z" clip-rule="evenodd"></path>
</svg>

</template>
