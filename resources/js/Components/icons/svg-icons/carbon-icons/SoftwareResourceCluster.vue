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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M24,21c-0.5,0-1-0.2-1.4-0.6l-3-3C19.2,17,19,16.5,19,16s0.2-1,0.6-1.4l3-3C23,11.2,23.5,11,24,11c0.5,0,1,0.2,1.4,0.6l3,3 C28.8,15,29,15.5,29,16c0,0.5-0.2,1-0.6,1.4l-3,3C25,20.8,24.5,21,24,21z M24,13l-3,3l3,3l3-3L24,13z"></path><path d="M16,13c-0.5,0-1-0.2-1.4-0.6l-3-3C11.2,9,11,8.5,11,8s0.2-1,0.6-1.4l3-3C15,3.2,15.5,3,16,3c0.5,0,1,0.2,1.4,0.6l3,3 C20.8,7,21,7.5,21,8c0,0.5-0.2,1-0.6,1.4l-3,3C17,12.8,16.5,13,16,13z M16,5l-3,3l3,3l3-3L16,5z"></path><path d="M16,29c-0.5,0-1-0.2-1.4-0.6l-3-3C11.2,25,11,24.5,11,24s0.2-1,0.6-1.4l3-3C15,19.2,15.5,19,16,19c0.5,0,1,0.2,1.4,0.6l3,3 C20.8,23,21,23.5,21,24c0,0.5-0.2,1-0.6,1.4l-3,3C17,28.8,16.5,29,16,29z M16,21l-3,3l3,3l3-3L16,21z"></path><path d="M8,21c-0.5,0-1-0.2-1.4-0.6l-3-3C3.2,17,3,16.5,3,16s0.2-1,0.6-1.4l3-3C7,11.2,7.5,11,8,11c0.5,0,1,0.2,1.4,0.6l3,3 C12.8,15,13,15.5,13,16c0,0.5-0.2,1-0.6,1.4l-3,3C9,20.8,8.5,21,8,21z M8,13l-3,3l3,3l3-3L8,13z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
