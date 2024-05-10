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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="30 6 26 6 26 2 24 2 24 6 20 6 20 8 24 8 24 12 26 12 26 8 30 8 30 6"></polygon><path d="M24,15v7.5562A3.9552,3.9552,0,0,0,22,22a4,4,0,1,0,4,4V15ZM22,28a2,2,0,1,1,2-2A2.0027,2.0027,0,0,1,22,28Z"></path><path d="M17,6H10A2.002,2.002,0,0,0,8,8V22.5562A3.9557,3.9557,0,0,0,6,22a4,4,0,1,0,4,4V8h7ZM6,28a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,6,28Z"></path><rect id="_Transparent_Rectangle_" data-name=" Transparent Rectangle " class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
