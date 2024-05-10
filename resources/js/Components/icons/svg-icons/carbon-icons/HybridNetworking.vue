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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>hybrid-networking</title><path d="M17,24.1836V20H15v4.1836a3,3,0,1,0,2,0Z"></path><path d="M26,12a3.9962,3.9962,0,0,0-3.8579,3H9.8579a4,4,0,1,0,0,2H22.1421A3.9934,3.9934,0,1,0,26,12ZM6,18a2,2,0,1,1,2-2A2.0025,2.0025,0,0,1,6,18Zm20,0a2,2,0,1,1,2-2A2.0025,2.0025,0,0,1,26,18Z"></path><path d="M19,5a3,3,0,1,0-4,2.8164V12h2V7.8164A2.9917,2.9917,0,0,0,19,5Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
