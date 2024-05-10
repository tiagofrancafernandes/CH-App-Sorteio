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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M27,19c-0.3,0-0.7,0.1-1,0.2L20.4,12c1-1.1,1.6-2.5,1.6-4c0-3.3-2.7-6-6-6s-6,2.7-6,6c0,1.6,0.6,3,1.6,4L6,19.2 C5.7,19.1,5.3,19,5,19c-1.7,0-3,1.3-3,3s1.3,3,3,3s3-1.3,3-3c0-0.6-0.2-1.1-0.5-1.6l5.6-7.1c0.6,0.3,1.2,0.5,1.9,0.6v10.3 c-1.2,0.4-2,1.5-2,2.8c0,1.7,1.3,3,3,3s3-1.3,3-3c0-1.3-0.8-2.4-2-2.8V13.9c0.7-0.1,1.3-0.3,1.9-0.6l5.6,7.1c-0.3,0.5-0.5,1-0.5,1.6 c0,1.7,1.3,3,3,3s3-1.3,3-3S28.7,19,27,19z M16,4c2.2,0,4,1.8,4,4s-1.8,4-4,4s-4-1.8-4-4S13.8,4,16,4z M5,23c-0.6,0-1-0.4-1-1 s0.4-1,1-1s1,0.4,1,1S5.6,23,5,23z M16,28c-0.6,0-1-0.4-1-1s0.4-1,1-1s1,0.4,1,1S16.6,28,16,28z M27,23c-0.6,0-1-0.4-1-1s0.4-1,1-1 s1,0.4,1,1S27.6,23,27,23z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
