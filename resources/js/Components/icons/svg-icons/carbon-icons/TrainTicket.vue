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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M29.1257,7.125a1.125,1.125,0,1,1,0-2.25h.875V2h-12V4.875h.875a1.125,1.125,0,0,1,0,2.25h-.875V10h12V7.125Z" transform="translate(0 0)"></path><path d="M22.0007,13v3h-16V10h9V8H6.185A2.9948,2.9948,0,0,1,9.0007,6h6V4h-6a5.0057,5.0057,0,0,0-5,5V21a4.99,4.99,0,0,0,3.582,4.77L5.77,30H7.9458L9.66,26h8.6812l1.7143,4h2.1758l-1.8127-4.23A4.99,4.99,0,0,0,24.0007,21V13Zm0,7h-3v2h2.8157a2.9948,2.9948,0,0,1-2.8157,2h-10A2.9948,2.9948,0,0,1,6.185,22H9.0007V20h-3V18h16Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
