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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>calibrate</title><path d="M28.83,21.17,25,17.37l.67-.67a1,1,0,0,0,0-1.41l-6-6a1,1,0,0,0-1.41,0h0l-.79.79L10.71,3.29a1,1,0,0,0-1.41,0h0l-4,4-.12.15-4,6a1,1,0,0,0,.12,1.26l3,3a1,1,0,0,0,1.42,0L10,13.41l2.09,2.09-4.8,4.79a1,1,0,0,0,0,1.41l2,2A1,1,0,0,0,10,24a1,1,0,0,0,.52-.15l4.33-2.6,2.44,2.45a1,1,0,0,0,1.41,0h0l.67-.7,3.79,3.83a4,4,0,0,0,5.66-5.66ZM10,10.58l-5,5L3.29,13.87,6.78,8.63,10,5.41l6.09,6.09L13.5,14.08Zm8,11-2.84-2.84-5,3L9.42,21,19,11.41,23.59,16Zm9.42,3.83a2,2,0,0,1-2.83,0h0l-3.8-3.79,2.83-2.83,3.8,3.79a2,2,0,0,1,0,2.83Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
