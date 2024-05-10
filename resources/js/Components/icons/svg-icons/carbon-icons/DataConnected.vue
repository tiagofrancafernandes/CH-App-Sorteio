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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>data--connected</title><polygon points="30 30 24 30 24 28 28 28 28 4 24 4 24 2 30 2 30 30"></polygon><path d="M24.91,19.59a4.51,4.51,0,0,0-2.66-3.24,4.55,4.55,0,0,0-3.5,0,4.94,4.94,0,0,0-.64.35L15.3,13.89a4.53,4.53,0,1,0-1.41,1.41l2.81,2.81a4.48,4.48,0,0,0-.61,3.3,4.51,4.51,0,0,0,2.66,3.24,4.55,4.55,0,0,0,3.5,0,4.51,4.51,0,0,0,2.66-3.24,4.65,4.65,0,0,0,0-1.82ZM11.5,14A2.5,2.5,0,1,1,14,11.5,2.5,2.5,0,0,1,11.5,14Z"></path><polygon points="8 30 2 30 2 2 8 2 8 4 4 4 4 28 8 28 8 30"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
