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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M24,2l-6,6l1.4,1.4L23,5.8V19c0,5-4,9-9,9c-1.6,0-3.1-0.4-4.3-1.1C10.1,27,10.5,27,11,27c4.4,0,8-3.6,8-8s-3.6-8-8-8 s-8,3.6-8,8c0,6.1,4.9,11,11,11s11-4.9,11-11V5.8l3.6,3.6L30,8L24,2z M5,19.6c0-0.2,0-0.4,0-0.6c0-3.3,2.7-6,6-6s6,2.7,6,6 s-2.7,6-6,6C7.9,25,5.3,22.6,5,19.6z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
