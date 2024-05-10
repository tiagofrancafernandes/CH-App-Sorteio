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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>text-fill</title><rect x="4" y="26" width="24" height="4"></rect><path d="M26,14.54a1,1,0,0,0-.25-.69L17.17,4.33A1.09,1.09,0,0,0,17,4.2V2H15V5L4.32,14.74a1,1,0,0,0-.06,1.41l8.57,9.52a1,1,0,0,0,.69.33h.05a1,1,0,0,0,.68-.26L24,16.8V21a1,1,0,0,0,2,0V14.57S26,14.55,26,14.54Zm-12.35,9-7.23-8L15,7.67V12h2V7.13l6.59,7.33Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
