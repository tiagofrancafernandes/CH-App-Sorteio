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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M31,8c0-0.4-0.2-0.7-0.5-0.9l-7-4C23.3,3,23.2,3,23,3s-0.3,0-0.5,0.1L16,6.8L9.5,3.1C9.3,3,9.2,3,9,3S8.7,3,8.5,3.1l-7,4 C1.2,7.3,1,7.6,1,8v20c0,0.6,0.4,1,1,1c0.2,0,0.3-0.1,0.5-0.1l0,0L9,25.2l6.5,3.7C15.7,29,15.8,29,16,29s0.3,0,0.5-0.1l6.5-3.7 l6.5,3.7l0,0c0.1,0.1,0.3,0.1,0.5,0.1c0.6,0,1-0.4,1-1V8z M3,8.6l5-2.9v17.7l-5,2.9V8.6z M15,26.3l-5-2.9V5.7l5,2.9V26.3z M22,23.4 l-5,2.9V8.6l5-2.9V23.4z M24,23.4V5.7l5,2.9l0,17.7L24,23.4z"></path><rect id="_x3C_Transparent_Rectangle_x3E__363_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
