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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M4,28c-1.7,0-3-1.3-3-3s1.3-3,3-3s3,1.3,3,3S5.7,28,4,28z M4,24c-0.6,0-1,0.4-1,1s0.4,1,1,1s1-0.4,1-1S4.6,24,4,24z"></path><path d="M28,28c-1.7,0-3-1.3-3-3s1.3-3,3-3s3,1.3,3,3S29.7,28,28,28z M28,24c-0.6,0-1,0.4-1,1s0.4,1,1,1s1-0.4,1-1S28.6,24,28,24z"></path><path d="M22.4,4.4l-0.9,1.8C26.1,8.4,29,13,29,18c0,0.7-0.1,1.4-0.2,2.1l2,0.3c0.1-0.8,0.2-1.6,0.2-2.5C31,12.2,27.6,6.9,22.4,4.4z"></path><path d="M16,7c-1.7,0-3-1.3-3-3s1.3-3,3-3s3,1.3,3,3S17.7,7,16,7z M16,3c-0.6,0-1,0.4-1,1s0.4,1,1,1s1-0.4,1-1S16.6,3,16,3z"></path><path d="M25.5,13.6l-1-1.7L17,16.3V9h-2v7.2L6.2,11c-0.5-0.3-1.1-0.1-1.4,0.3s-0.1,1.1,0.3,1.4L14,18l-6.2,3.6l1,1.7l6.2-3.6V30 c0,0.6,0.4,1,1,1s1-0.4,1-1V19.8l6.2,3.7l1-1.7L18,18L25.5,13.6z"></path><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
