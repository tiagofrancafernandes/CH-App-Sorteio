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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M16.1,3.2l7.7,0.9c0.2,0,0.3,0.1,0.4,0.2l5.7,7.7c0.2,0.2,0.2,0.5,0,0.7l-13.6,16c-0.1,0.1-0.3,0.1-0.4,0c0,0,0,0,0,0 l-13.6-16C2,12.5,2,12.2,2.1,12l5.7-7.7c0.1-0.1,0.2-0.2,0.4-0.2l7.7-0.9C16,3.2,16,3.2,16.1,3.2z M17.7,4.8c0,0-0.1,0-0.2,0 c0,0-0.1,0.1,0,0.2l0,0l4.3,5.4c0,0.1,0.1,0.1,0.1,0.2c0,0.2-0.1,0.3-0.3,0.3l0,0H10.4c-0.1,0-0.1,0-0.2-0.1 c-0.1-0.1-0.1-0.3-0.1-0.4l0,0L14.5,5c0,0,0-0.1,0-0.2c0,0-0.1,0-0.2,0l0,0l-5.9,5.9c0,0-0.1,0.1-0.2,0.1c-0.1,0-0.2-0.1-0.2-0.2v0 l0.2-4.3c0-0.1,0-0.1-0.1-0.1c-0.1,0-0.1,0-0.1,0.1l0,0l-1.1,4.9c0,0.2-0.2,0.3-0.3,0.3l0,0l-2.8,0.6c-0.1,0-0.1,0.1-0.1,0.1 c0,0.1,0,0.1,0.1,0.1l0,0h2.7c0.2,0,0.3,0.1,0.4,0.2l0,0l6.6,11.8c0,0.1,0.1,0.1,0.2,0.1c0.1,0,0.1-0.1,0.1-0.2l0,0L8.6,12.9 c0,0,0-0.1,0-0.1c0-0.2,0.1-0.3,0.3-0.4l0,0h14.2c0.1,0,0.1,0,0.2,0c0.2,0.1,0.2,0.3,0.2,0.4l0,0l-5.3,11.3c0,0.1,0,0.2,0.1,0.2 c0.1,0,0.2,0,0.2-0.1l0,0L25,12.6c0.1-0.1,0.2-0.2,0.4-0.2l0,0h2.7c0.1,0,0.1,0,0.1-0.1c0-0.1,0-0.1-0.1-0.1l0,0l-2.8-0.6 c-0.2,0-0.3-0.2-0.4-0.3l0,0L24,6.3c0-0.1-0.1-0.1-0.1-0.1c-0.1,0-0.1,0-0.1,0.1v0l0.2,4.3c0,0.1,0,0.1-0.1,0.2 c-0.1,0.1-0.2,0.1-0.3,0l0,0L17.7,4.8z"></path><rect id="_x3C_Transparent_Rectangle_x3E__363_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
