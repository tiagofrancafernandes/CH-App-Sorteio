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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>text--tracking</title><polygon points="25.29 19.29 23.88 20.71 26.17 23 5.83 23 8.12 20.71 6.71 19.29 2 24 6.71 28.71 8.12 27.29 5.83 25 26.17 25 23.88 27.29 25.29 28.71 30 24 25.29 19.29"></polygon><path d="M26,17h2L23,3H21L16,17h2l1-3h6Zm-6.33-5L22,5l2.33,7Z"></path><polygon points="14 3 10 15 6 3 4 3 9 17 11 17 16 3 14 3"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
