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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M16,25.4l-8-4.7v-9.4l8-4.7l8,4.7v9.4L16,25.4z M10,19.6l6,3.5l6-3.5v-7.1l-6-3.5l-6,3.5V19.6z"></path><path d="M27,8.2L17,2.3C16.7,2.1,16.4,2,16,2s-0.7,0.1-1,0.3L5,8.2c-0.6,0.4-1,1-1,1.7v12.2c0,0.7,0.4,1.4,1,1.7l10,5.9 c0.3,0.2,0.7,0.3,1,0.3s0.7-0.1,1-0.3l10-5.9c0.6-0.4,1-1,1-1.7V9.9C28,9.2,27.6,8.5,27,8.2z M26,22.1L16,28L6,22.1V9.9L16,4l10,5.9 V22.1z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
