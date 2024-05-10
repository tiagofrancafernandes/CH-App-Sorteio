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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>data-refinery</title><path d="M7,30a5,5,0,1,1,5-5A5.0059,5.0059,0,0,1,7,30Zm0-8a3,3,0,1,0,3,3A3.0033,3.0033,0,0,0,7,22Z"></path><path d="M24,26H14V24H24V17H8a2.0021,2.0021,0,0,1-2-2V8A2.0021,2.0021,0,0,1,8,6H18V8H8v7H24a2.0021,2.0021,0,0,1,2,2v7A2.0021,2.0021,0,0,1,24,26Z"></path><path d="M28,12H22a2.0023,2.0023,0,0,1-2-2V4a2.0023,2.0023,0,0,1,2-2h6a2.0023,2.0023,0,0,1,2,2v6A2.0023,2.0023,0,0,1,28,12ZM22,4v6h6V4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
