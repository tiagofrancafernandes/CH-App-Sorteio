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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>reply</title><path d="M28.88,30a1,1,0,0,1-.88-.5A15.19,15.19,0,0,0,15,22v6a1,1,0,0,1-.62.92,1,1,0,0,1-1.09-.21l-12-12a1,1,0,0,1,0-1.42l12-12a1,1,0,0,1,1.09-.21A1,1,0,0,1,15,4v6.11a17.19,17.19,0,0,1,15,17,16.34,16.34,0,0,1-.13,2,1,1,0,0,1-.79.86ZM14.5,20A17.62,17.62,0,0,1,28,26,15.31,15.31,0,0,0,13.91,12,1,1,0,0,1,13,11V6.41L3.41,16,13,25.59V21a1,1,0,0,1,1-1h.54Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
