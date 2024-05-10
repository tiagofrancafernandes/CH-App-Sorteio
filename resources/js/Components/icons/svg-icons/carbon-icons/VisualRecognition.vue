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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>visual-recognition</title><circle cx="23" cy="12" r="2"></circle><path d="M28,5H16.24A8,8,0,1,0,6,16.92V27a2,2,0,0,0,2,2H28a2,2,0,0,0,2-2V7A2,2,0,0,0,28,5ZM4,10A6,6,0,0,1,15.19,7H8V9h7.91A6.64,6.64,0,0,1,16,10a6.64,6.64,0,0,1-.09,1H10v2h5.19A6,6,0,0,1,4,10ZM28,27H8l5-5,1.59,1.59a2,2,0,0,0,2.82,0L23,18l5,5Zm0-6.83-3.59-3.59a2,2,0,0,0-2.82,0L16,22.17l-1.59-1.59a2,2,0,0,0-2.82,0L8,24.17V17.74A8.24,8.24,0,0,0,10,18a8,8,0,0,0,8-8,7.9,7.9,0,0,0-.59-3H28Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
