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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>ibm-security</title><path id="IBM_Security_Shield" data-name="IBM Security Shield" d="M16,.0005,4,5.9784V20.0443a12,12,0,0,0,24,0V5.9784Zm6.83,27.3138L16,23.9119V26.14l5.0361,2.5088A10.0025,10.0025,0,0,1,6,20.0443V7.21L16,2.2284,26,7.21v3.75L16,5.9783V8.2062l10,4.9816v3.75L16,11.9562v2.2279l10,4.9815v.8787a9.9045,9.9045,0,0,1-.37,2.6871L16,17.934v2.2279l8.8952,4.4313A10.0252,10.0252,0,0,1,22.83,27.3143Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
