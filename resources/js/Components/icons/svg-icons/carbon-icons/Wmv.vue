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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>WMV</title><polygon points="29 9 27 22 25 9 23 9 25.52 23 28.48 23 31 9 29 9"></polygon><polygon points="19 9 17.48 14 17 15.98 16.54 14 15 9 13 9 13 23 15 23 15 15 14.84 13 15.42 15 17 19.63 18.58 15 19.16 13 19 15 19 23 21 23 21 9 19 9"></polygon><polygon points="9.2 9 8.86 17 8.6 21.54 8.19 18 7.51 12.54 5.49 12.54 4.81 18 4.4 21.54 4.14 17 3.8 9 2 9 3 23 5.27 23 6.03 18.07 6.49 14 6.5 13.97 6.51 14 6.97 18.07 7.73 23 10 23 11 9 9.2 9"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
