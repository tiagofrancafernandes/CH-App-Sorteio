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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><rect x="10" y="19" width="8" height="2"></rect><rect x="10" y="15" width="12" height="2"></rect><rect x="10" y="11" width="12" height="2"></rect><path d="M16,2v2c6.6,0,12,5.4,12,12s-5.4,12-12,12v2c7.7,0,14-6.3,14-14S23.7,2,16,2z"></path><path d="M8.2,25.1L7,26.7c1.2,1,2.6,1.9,4.2,2.4l0.7-1.9C10.5,26.7,9.3,26,8.2,25.1z"></path><path d="M4.2,18l-2,0.4C2.5,20,3.1,21.6,3.9,23l1.7-1C4.9,20.8,4.4,19.4,4.2,18z"></path><path d="M5.6,10L3.9,9c-0.8,1.4-1.4,3-1.6,4.6l2,0.3C4.4,12.5,4.9,11.2,5.6,10z"></path><path d="M11.8,4.8l-0.7-1.9C9.6,3.5,8.2,4.3,7,5.3l1.3,1.5C9.3,6,10.5,5.3,11.8,4.8z"></path><rect id="_x3C_Transparent_Rectangle_x3E__363_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
