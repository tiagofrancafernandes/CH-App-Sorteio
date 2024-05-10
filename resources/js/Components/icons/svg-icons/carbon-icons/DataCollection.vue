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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="16" cy="16" r="2"></circle><polygon points="30 17 30 15 23.83 15 26.41 12.41 25 11 20 16 25 21 26.41 19.59 23.83 17 30 17"></polygon><polygon points="15 23.83 15 30 17 30 17 23.83 19.59 26.41 21 25 16 20 11 25 12.41 26.41 15 23.83"></polygon><polygon points="7 11 5.59 12.41 8.17 15 2 15 2 17 8.17 17 5.59 19.59 7 21 12 16 7 11"></polygon><polygon points="17 8.17 17 2 15 2 15 8.17 12.41 5.59 11 7 16 12 21 7 19.59 5.59 17 8.17"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
