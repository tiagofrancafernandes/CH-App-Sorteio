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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>text-selection</title><path d="M28,27H21a3,3,0,0,1-3-3V22a3,3,0,0,1,3-3h5V17a1,1,0,0,0-1-1H19V14h6a3,3,0,0,1,3,3Zm-7-6a1,1,0,0,0-1,1v2a1,1,0,0,0,1,1h5V21Z"></path><path d="M13,7h3V5H13a4,4,0,0,0-3,1.38A4,4,0,0,0,7,5H4V7H7A2,2,0,0,1,9,9v5H5v2H9v7a2,2,0,0,1-2,2H4v2H7a4,4,0,0,0,3-1.38A4,4,0,0,0,13,27h3V25H13a2,2,0,0,1-2-2V16h4V14H11V9A2,2,0,0,1,13,7Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
