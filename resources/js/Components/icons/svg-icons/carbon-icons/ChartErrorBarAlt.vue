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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>chart--error-bar-alt</title><path d="M14,10V8H8v2h2v4.1836a2.983,2.983,0,0,0,0,5.6328V24H8v2h6V24H12V19.8164a2.983,2.983,0,0,0,0-5.6328V10Z"></path><path d="M26,6V4H20V6h2V8.1836a2.983,2.983,0,0,0,0,5.6328V18H20v2h6V18H24V13.8164a2.983,2.983,0,0,0,0-5.6328V6Z"></path><path d="M30,30H4a2,2,0,0,1-2-2V2H4V28H30Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
