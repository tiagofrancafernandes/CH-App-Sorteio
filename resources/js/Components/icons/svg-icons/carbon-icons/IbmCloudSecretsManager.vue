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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M20,16c0-0.7-0.2-1.4-0.6-2l3.3-3.3l-1.4-1.4L18,12.6c-0.6-0.4-1.3-0.6-2-0.6c-0.7,0-1.4,0.2-2,0.6l-3.3-3.3l-1.4,1.4 l3.3,3.3c-0.4,0.6-0.6,1.3-0.6,2c0,0.7,0.2,1.4,0.6,2l-3.3,3.3l1.4,1.4l3.3-3.3c0.6,0.4,1.3,0.6,2,0.6c0.7,0,1.4-0.2,2-0.6l3.3,3.3 l1.4-1.4L19.4,18C19.8,17.4,20,16.7,20,16z M16,18c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2c1.1,0,2,0.9,2,2C18,17.1,17.1,18,16,18z"></path><path d="M26,17h6v-2h-2.1C29.4,7.7,23.4,2,16,2C8.3,2,2,8.3,2,16s6.3,14,14,14c5.2,0,9.7-2.8,12.1-7l-1.7-1c-2.1,3.6-5.9,6-10.4,6 C9.4,28,4,22.6,4,16C4,9.4,9.4,4,16,4c6.3,0,11.4,4.9,11.9,11H26V17z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
