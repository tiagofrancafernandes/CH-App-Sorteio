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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>phone--filled</title><path d="M20.33,21.48l2.24-2.24a2.19,2.19,0,0,1,2.34-.48l2.73,1.09a2.18,2.18,0,0,1,1.36,2v5A2.17,2.17,0,0,1,26.72,29C7.59,27.81,3.73,11.61,3,5.41A2.17,2.17,0,0,1,5.17,3H10a2.16,2.16,0,0,1,2,1.36l1.09,2.73a2.16,2.16,0,0,1-.47,2.34l-2.24,2.24S11.67,20.4,20.33,21.48Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
