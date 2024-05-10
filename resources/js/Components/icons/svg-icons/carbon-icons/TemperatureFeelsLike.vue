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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M26,30H22a2.0059,2.0059,0,0,1-2-2V21a2.0059,2.0059,0,0,1-2-2V13a2.9465,2.9465,0,0,1,3-3h6a2.9465,2.9465,0,0,1,3,3v6a2.0059,2.0059,0,0,1-2,2v7A2.0059,2.0059,0,0,1,26,30ZM21,12a.9448.9448,0,0,0-1,1v6h2v9h4V19h2V13a.9448.9448,0,0,0-1-1Z" transform="translate(0 0)"></path><path d="M24,9a4,4,0,1,1,4-4h0A4.0118,4.0118,0,0,1,24,9Zm0-6a2,2,0,1,0,2,2h0a2.0059,2.0059,0,0,0-2-2Z" transform="translate(0 0)"></path><path d="M10,20.1839V12H8v8.1839a3,3,0,1,0,2,0Z" transform="translate(0 0)"></path><path d="M9,30A6.9931,6.9931,0,0,1,4,18.1108V7A5,5,0,0,1,14,7V18.1108A6.9931,6.9931,0,0,1,9,30ZM9,4A3.0033,3.0033,0,0,0,6,7V18.9834l-.332.2983a5,5,0,1,0,6.664,0L12,18.9834V7A3.0033,3.0033,0,0,0,9,4Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
