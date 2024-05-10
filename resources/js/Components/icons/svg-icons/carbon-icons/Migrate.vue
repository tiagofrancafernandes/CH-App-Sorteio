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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>migrate</title><path d="M26,2H6A2,2,0,0,0,4,4V8a2,2,0,0,0,2,2h9v6.17l-2.59-2.58L11,15l5,5,5-5-1.41-1.41L17,16.17V10h9a2,2,0,0,0,2-2V4A2,2,0,0,0,26,2ZM6,4h4V8H6ZM26,8H12V4H26Z"></path><path d="M26,22H6a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H26a2,2,0,0,0,2-2V24A2,2,0,0,0,26,22ZM6,24H20v4H6Zm20,4H22V24h4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
