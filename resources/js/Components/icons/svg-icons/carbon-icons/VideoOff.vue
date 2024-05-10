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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>video--off</title><path d="M29.46,8.11a1,1,0,0,0-1,.08L23,12.06V10.44l7-7L28.56,2,2,28.56,3.44,30l4-4H21a2,2,0,0,0,2-2V19.94l5.42,3.87A1,1,0,0,0,30,23V9A1,1,0,0,0,29.46,8.11ZM28,21.06l-5.42-3.87A1,1,0,0,0,21,18v6H9.44L21,12.44V14a1,1,0,0,0,1.58.81L28,10.94Z"></path><path d="M4,24V8H20V6H4A2,2,0,0,0,2,8V24Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
