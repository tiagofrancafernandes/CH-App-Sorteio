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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>cut</title><path d="M26.5,19.63,20.24,16l6.26-3.63a5,5,0,0,0-1.21-9.2A5.19,5.19,0,0,0,24,3a5,5,0,0,0-4.33,7.53,5,5,0,0,0,2.39,2.1l-3.82,2.21L4,6.6,3,8.34,16.24,16,3,23.68l1,1.74,14.24-8.26,3.82,2.21a5,5,0,0,0-2.39,2.1A5,5,0,0,0,24,29a5.19,5.19,0,0,0,1.29-.17,5,5,0,0,0,1.21-9.2ZM21.4,9.53a3,3,0,0,1,1.1-4.12,3,3,0,0,1,4.1,1.11,3,3,0,0,1-1.1,4.11h0A3,3,0,0,1,21.4,9.53Zm5.2,16a3,3,0,0,1-4.1,1.11,3,3,0,0,1-1.1-4.12,3,3,0,0,1,4.1-1.1h0A3,3,0,0,1,26.6,25.48Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
