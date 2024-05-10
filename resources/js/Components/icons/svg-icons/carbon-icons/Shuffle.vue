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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>shuffle</title><path d="M22.59,19.41,26.17,23H19.55l-4.37-7,4.37-7h6.62l-3.58,3.59L24,14l6-6L24,2,22.59,3.41,26.17,7H19.55a2,2,0,0,0-1.69.94L14,14.11,10.14,7.94A2,2,0,0,0,8.45,7H2V9H8.45l4.37,7L8.45,23H2v2H8.45a2,2,0,0,0,1.69-.94L14,17.89l3.86,6.17a2,2,0,0,0,1.69.94h6.62l-3.58,3.59L24,30l6-6-6-6Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
