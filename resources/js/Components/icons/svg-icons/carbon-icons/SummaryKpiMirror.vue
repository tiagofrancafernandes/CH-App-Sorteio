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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M24.3,27.5l5.7-5.1L28.7,21L23,26l-7.7-7.4c-0.7-0.7-1.9-0.7-2.7,0L9,22l-5.6-6L2,17.4l5.6,6c0.8,0.8,2,0.8,2.8,0.1L14,20 l7.7,7.4C22.4,28.2,23.6,28.2,24.3,27.5z"></path><polygon points="28,12 28,4 26,4 26,5 24,5 24,7 26,7 26,12 24,12 24,14 30,14 30,12 "></polygon><path d="M22,14h-6v-4c0-1.1,0.9-2,2-2h2V6h-4V4h4c1.1,0,2,0.9,2,2v2c0,1.1-0.9,2-2,2h-2v2h4V14z"></path><path d="M12,4H8v2h4v2H9v2h3v2H8v2h4c1.1,0,2-0.9,2-2V6C14,4.9,13.1,4,12,4z"></path><polygon points="6,11 2,11 4,8 "></polygon><rect id="_x3C_Transparent_Rectangle_x3E__363_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
