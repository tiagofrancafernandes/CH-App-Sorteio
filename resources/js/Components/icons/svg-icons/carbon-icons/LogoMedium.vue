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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M30,16c0,3.7-0.6,6.7-1.4,6.7c-0.8,0-1.4-3-1.4-6.7s0.6-6.7,1.4-6.7C29.4,9.3,30,12.3,30,16"></path><path d="M26.5,16c0,4.1-1.8,7.5-3.9,7.5s-3.9-3.4-3.9-7.5s1.8-7.5,3.9-7.5S26.5,11.9,26.5,16"></path><path d="M17.8,16c0,4.4-3.5,8-7.9,8S2,20.4,2,16s3.5-8,7.9-8S17.8,11.6,17.8,16"></path><rect id="_x3C_Transparent_Rectangle_x3E__155_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
