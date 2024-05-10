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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>reminder--medical</title><path d="M27,12v2h1v4a3,3,0,0,1-6,0V14h1V12H20v6a5.0083,5.0083,0,0,0,4,4.8989V24a4,4,0,0,1-8,0V21.8157a3,3,0,1,0-2,0V24a6,6,0,0,0,12,0V22.8989A5.0083,5.0083,0,0,0,30,18V12ZM15,18a1,1,0,1,1-1,1A1.0009,1.0009,0,0,1,15,18Z"></path><path d="M26,4H22V2H20V4H12V2H10V4H6A2,2,0,0,0,4,6V26a2,2,0,0,0,2,2l4,0V26L6,26V6h4V8h2V6h8V8h2V6h4v4h2V6A2,2,0,0,0,26,4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
