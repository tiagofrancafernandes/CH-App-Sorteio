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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M20,18v6.5c0,1.9,1.1,3.7,2.9,4.5l2.1,1l2.1-1c1.7-0.8,2.9-2.6,2.9-4.5V18H20z M28,24.5c0,1.2-0.7,2.2-1.7,2.7L25,27.8 l-1.3-0.6c-1-0.5-1.7-1.6-1.7-2.7V20h6V24.5z"></path><path d="M16,20c-2.2,0-4-1.8-4-4s1.8-4,4-4s4,1.8,4,4h-2c0-1.1-0.9-2-2-2s-2,0.9-2,2s0.9,2,2,2V20z"></path><path d="M16,25c-5,0-9-4-9-9s4-9,9-9s9,4,9,9h-2c0-3.9-3.1-7-7-7s-7,3.1-7,7s3.1,7,7,7V25z"></path><path d="M16,30C8.3,30,2,23.7,2,16S8.3,2,16,2s14,6.3,14,14h-2c0-6.6-5.4-12-12-12S4,9.4,4,16s5.4,12,12,12V30z"></path><rect id="_x3C_Transparent_Rectangle_x3E__155_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
