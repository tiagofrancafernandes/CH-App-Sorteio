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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="22 4 22 6 24.586 6 19.586 11 21 12.414 26 7.414 26 10 28 10 28 4 22 4"></polygon><polygon points="10 4 10 6 7.414 6 12.414 11 11 12.414 6 7.414 6 10 4 10 4 4 10 4"></polygon><polygon points="20 5 16 1 12 5 13.414 6.414 15 4.829 15 11 17 11 17 4.829 18.586 6.414 20 5"></polygon><polygon points="22 28 22 26 24.586 26 19.586 21 21 19.586 26 24.586 26 22 28 22 28 28 22 28"></polygon><polygon points="10 28 10 26 7.414 26 12.414 21 11 19.586 6 24.586 6 22 4 22 4 28 10 28"></polygon><polygon points="20 27 16 31 12 27 13.414 25.586 15 27.171 15 21 17 21 17 27.171 18.586 25.586 20 27"></polygon><polygon points="5 12 1 16 5 20 6.414 18.586 4.829 17 11 17 11 15 4.829 15 6.414 13.414 5 12"></polygon><polygon points="27 12 31 16 27 20 25.586 18.586 27.171 17 21 17 21 15 27.171 15 25.586 13.414 27 12"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
