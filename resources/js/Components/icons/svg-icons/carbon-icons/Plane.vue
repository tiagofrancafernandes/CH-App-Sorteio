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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>plane</title><path d="M29.37,14.75,20,10V6a4,4,0,0,0-8,0v4L2.63,14.75a1,1,0,0,0-.63.93v5a1,1,0,0,0,1,1,1,1,0,0,0,.29-.05L12,18v5L8.55,24.72a1,1,0,0,0-.55.9V29a1,1,0,0,0,1,1,.9.9,0,0,0,.28,0L16,28l6.72,2A.9.9,0,0,0,23,30a1,1,0,0,0,1-1V25.62a1,1,0,0,0-.55-.9L20,23V18l8.71,3.61a1,1,0,0,0,.29.05,1,1,0,0,0,1-1v-5A1,1,0,0,0,29.37,14.75ZM28,19.15,18,15v9.24l4,2v1.43l-6-1.75-6,1.75V26.24l4-2V15L4,19.15V16.3l10-5.07V6a2,2,0,0,1,4,0v5.23L28,16.3Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
