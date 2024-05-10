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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>wireless-checkout</title><path d="M18,28V26A10,10,0,0,0,28,16h2A12,12,0,0,1,18,28Z"></path><path d="M18,23V21a5,5,0,0,0,5-5h2A7,7,0,0,1,18,23Z"></path><path d="M27,11H21V7a3,3,0,0,0-3-3H12A3,3,0,0,0,9,7v4H3a1,1,0,0,0-1,1.15L3.88,24.3a2,2,0,0,0,2,1.7H15V24H5.86L4.17,13H27ZM11,7a1,1,0,0,1,1-1h6a1,1,0,0,1,1,1v4H11Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
