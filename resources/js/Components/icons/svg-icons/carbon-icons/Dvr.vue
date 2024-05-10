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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>DVR</title><path d="M30,15V11a2,2,0,0,0-2-2H22V23h2V17h1.48l2.34,6H30l-2.33-6H28A2,2,0,0,0,30,15Zm-6-4h4v4H24Z"></path><polygon points="18 9 16 22 14 9 12 9 14.52 23 17.48 23 20 9 18 9"></polygon><path d="M6,23H2V9H6a4,4,0,0,1,4,4v6A4,4,0,0,1,6,23ZM4,21H6a2,2,0,0,0,2-2V13a2,2,0,0,0-2-2H4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
