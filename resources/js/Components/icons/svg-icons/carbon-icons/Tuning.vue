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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m24,30v-4.1c2.3-.5,4-2.5,4-4.9,0-2.4-1.7-4.4-4-4.9V2s-2,0-2,0v14.1c-2.3.5-4,2.5-4,4.9,0,2.4,1.7,4.4,4,4.9v4.1s2,0,2,0Zm-4-9c0-1.7,1.3-3,3-3s3,1.3,3,3c0,1.7-1.3,3-3,3s-3-1.3-3-3Z"></path><path d="m8,2v4.1c-2.3.5-4,2.5-4,4.9,0,2.4,1.7,4.4,4,4.9v14.1s2,0,2,0v-14.1c2.3-.5,4-2.5,4-4.9,0-2.4-1.7-4.4-4-4.9V2s-2,0-2,0Zm4,9c0,1.7-1.3,3-3,3s-3-1.3-3-3,1.3-3,3-3,3,1.3,3,3Z"></path><g id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;"><rect class="cls-1" width="32" height="32" style="fill: none"></rect></g></svg>

</template>
