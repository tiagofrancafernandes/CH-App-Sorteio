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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>letter--Ww</title><polygon points="24.3 13 23.39 21.61 22 13 20 13 18.61 21.61 17.7 13 16 13 17.36 23 19.64 23 21 14.63 22.36 23 24.64 23 26 13 24.3 13"></polygon><polygon points="12.21 9 11.87 17 11.61 21.54 11.2 18 10.52 12.54 8.5 12.54 7.82 18 7.41 21.54 7.16 17 6.81 9 5.01 9 6.01 23 8.28 23 9.04 18.07 9.5 14 9.51 13.97 9.52 14 9.98 18.07 10.74 23 13.01 23 14.01 9 12.21 9"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
