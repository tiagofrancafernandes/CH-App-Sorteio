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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>phone--off--filled</title><path d="M26.74,19.56l-2.52-1a2,2,0,0,0-2.15.44L20,21.06a9.93,9.93,0,0,1-5.35-2.29L30,3.41,28.59,2,2,28.59,3.41,30l7.93-7.92c3.24,3.12,7.89,5.5,14.55,5.92A2,2,0,0,0,28,26V21.41A2,2,0,0,0,26.74,19.56Z" transform="translate(0 0)"></path><path d="M8.15,18.19l3.52-3.52A11.68,11.68,0,0,1,10.85,12l2.07-2.07a2,2,0,0,0,.44-2.15l-1-2.52A2,2,0,0,0,10.5,4H6A2,2,0,0,0,4,6.22,29,29,0,0,0,8.15,18.19Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
