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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M21.3,4.9l-4.5-2.7C16.5,2.1,16.3,2,16,2s-0.5,0.1-0.7,0.2l-4.5,2.7C10.3,5.2,10,5.7,10,6.2v5.6c0,0.5,0.3,1,0.7,1.3 l4.5,2.7c0.2,0.1,0.5,0.2,0.7,0.2s0.5-0.1,0.7-0.2l4.5-2.7c0.4-0.3,0.7-0.7,0.7-1.3V6.2C22,5.7,21.7,5.2,21.3,4.9z M20,11.5l-4,2.4 l-4-2.4v-5l4-2.4l4,2.4V11.5z"></path><path d="M29.3,18.9l-4.5-2.7C24.5,16.1,24.3,16,24,16s-0.5,0.1-0.7,0.2l-4.5,2.7c-0.4,0.3-0.7,0.7-0.7,1.3v5.6c0,0.5,0.3,1,0.7,1.3 l4.5,2.7c0.2,0.1,0.5,0.2,0.7,0.2s0.5-0.1,0.7-0.2l4.5-2.7c0.4-0.3,0.7-0.7,0.7-1.3v-5.6C30,19.7,29.7,19.2,29.3,18.9z M28,25.5 l-4,2.4l-4-2.4v-5l4-2.4l4,2.4V25.5z"></path><path d="M13.3,18.9l-4.5-2.7C8.5,16.1,8.3,16,8,16s-0.5,0.1-0.7,0.2l-4.5,2.7C2.3,19.2,2,19.7,2,20.2v5.6c0,0.5,0.3,1,0.7,1.3 l4.5,2.7C7.5,29.9,7.7,30,8,30s0.5-0.1,0.7-0.2l4.5-2.7c0.4-0.3,0.7-0.7,0.7-1.3v-5.6C14,19.7,13.7,19.2,13.3,18.9z M12,25.5l-4,2.4 l-4-2.4v-5l4-2.4l4,2.4V25.5z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
