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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path id="_x3C_Path_x3E__00000043425793413296290420000018093581292944339895_" d="M30,18v5.5c0,1.5-0.9,2.8-2.3,3.5L26,27.8 L24.3,27c-1.4-0.6-2.3-2-2.3-3.5V18H30 M32,16H20v7.5c0,2.2,1.3,4.3,3.4,5.3L26,30l2.6-1.2c2.1-1,3.4-3,3.4-5.3V16L32,16z"></path><path d="M16,25H7.5C3.4,25,0,21.6,0,17.5c0-3.7,2.7-6.7,6.2-7.4C7.1,5.4,11.2,2,16,2c5.5,0,10,4.5,10,10h-2c0-4.4-3.6-8-8-8 c-4.1,0-7.5,3.1-8,7.1L8,12L7.1,12C4.2,12.2,2,14.6,2,17.5c0,3,2.5,5.5,5.5,5.5H16V25z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
