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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M27,22c-0.7,0-1.4,0.3-1.9,0.7l-5.2-3.1c0-0.2,0.1-0.4,0.1-0.6s0-0.4-0.1-0.6l5.2-3.1c0.5,0.4,1.2,0.7,1.9,0.7 c1.7,0,3-1.3,3-3s-1.3-3-3-3s-3,1.3-3,3c0,0.2,0,0.4,0.1,0.6l-5.2,3.1C18.4,16.3,17.7,16,17,16c-1.7,0-3,1.3-3,3s1.3,3,3,3 c0.7,0,1.4-0.3,1.9-0.7l5.2,3.1c0,0.2-0.1,0.4-0.1,0.6c0,1.7,1.3,3,3,3s3-1.3,3-3S28.7,22,27,22z M27,12c0.6,0,1,0.4,1,1s-0.4,1-1,1 s-1-0.4-1-1S26.4,12,27,12z M17,20c-0.6,0-1-0.4-1-1s0.4-1,1-1s1,0.4,1,1S17.6,20,17,20z M27,26c-0.6,0-1-0.4-1-1s0.4-1,1-1 s1,0.4,1,1S27.6,26,27,26z"></path><path d="M19,25H8.5c-3,0-5.5-2.5-5.5-5.5c0-2.7,1.9-4.9,4.5-5.4l1.3-0.2l0.3-1.3C9.9,8.7,13.2,6,17,6c0.5,0,1,0,1.5,0.1 c1.6,0.3,3,1.1,4.2,2.2l1.4-1.4c-1.4-1.4-3.2-2.4-5.2-2.7C18.3,4.1,17.6,4,17,4c-4.7,0-8.9,3.3-9.8,8.1C3.6,12.8,1,15.9,1,19.5 C1,23.6,4.3,27,8.5,27H19V25z"></path><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
