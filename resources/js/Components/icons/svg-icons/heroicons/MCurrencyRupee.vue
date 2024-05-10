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
  <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM6 5.75A.75.75 0 0 1 6.75 5h6.5a.75.75 0 0 1 0 1.5h-2.127c.4.5.683 1.096.807 1.75h1.32a.75.75 0 0 1 0 1.5h-1.32a4.003 4.003 0 0 1-3.404 3.216l1.754 1.754a.75.75 0 0 1-1.06 1.06l-3-3a.75.75 0 0 1 .53-1.28H8c1.12 0 2.067-.736 2.386-1.75H6.75a.75.75 0 0 1 0-1.5h3.636A2.501 2.501 0 0 0 8 6.5H6.75A.75.75 0 0 1 6 5.75Z" clip-rule="evenodd"></path>
</svg>

</template>
