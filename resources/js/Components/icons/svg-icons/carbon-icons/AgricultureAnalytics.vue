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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M24.251,21.3691l2.1943,1.4629A1,1,0,0,0,27.8,22.6l3-4-1.6-1.2-2.4326,3.2437L24.5547,19.168a1,1,0,0,0-1.3687.2509L20,23.8789V16H18V26a2.0023,2.0023,0,0,0,2,2H30V26H20.9434Z" transform="translate(0 0)"></path><rect x="2" y="21" width="14" height="2"></rect><rect x="2" y="26" width="14" height="2"></rect><path d="M11,16V11h1a4.0046,4.0046,0,0,0,4-4V4H13a3.9782,3.9782,0,0,0-2.7468,1.1066A6.0033,6.0033,0,0,0,5,2H2V5a6.0066,6.0066,0,0,0,6,6H9v5H2v2H16V16ZM13,6h1V7a2.002,2.002,0,0,1-2,2H11V8A2.0019,2.0019,0,0,1,13,6ZM8,9A4.0046,4.0046,0,0,1,4,5V4H5A4.0045,4.0045,0,0,1,9,8V9Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
