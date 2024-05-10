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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M26,29h-0.2C6.2,27.9,3.4,11.3,3,6.2C2.9,4.6,4.1,3.1,5.8,3C5.8,3,5.9,3,6,3h5.3c0.8,0,1.6,0.5,1.9,1.3L14.6,8 c0.3,0.7,0.1,1.6-0.4,2.2l-2.1,2.1c0.7,3.9,3.7,6.9,7.6,7.6l2.2-2.1c0.6-0.6,1.4-0.7,2.2-0.4l3.8,1.5c0.7,0.3,1.2,1,1.2,1.9V26 C29,27.7,27.7,29,26,29z M6,5C5.4,5,5,5.4,5,6c0,0,0,0.1,0,0.1C5.5,12,8.4,26,25.9,27c0.6,0,1-0.4,1.1-0.9c0,0,0,0,0-0.1v-5.3 l-3.8-1.5l-2.9,2.9L19.9,22c-8.7-1.1-9.9-9.8-9.9-9.9l-0.1-0.5l2.8-2.9L11.3,5H6z"></path><polygon class="st0" points="20,4 20,6 24.6,6 18,12.6 19.4,14 26,7.4 26,12 28,12 28,4 " style="fill:currentColor"></polygon><rect id="_x3C_Transparent_Rectangle_x3E__250_" x="0" class="st1" width="32" height="32" style="fill:none"></rect></svg>

</template>
