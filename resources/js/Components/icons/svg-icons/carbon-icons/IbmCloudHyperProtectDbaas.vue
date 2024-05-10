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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M24,30l-2.1-1c-1.7-0.8-2.9-2.6-2.9-4.5V18h10v6.5c0,1.9-1.1,3.7-2.9,4.5L24,30z M21,20v4.5c0,1.2,0.7,2.2,1.7,2.7l1.3,0.6 l1.3-0.6c1-0.5,1.7-1.6,1.7-2.7V20H21z"></path><circle cx="10" cy="23" r="1"></circle><circle cx="10" cy="15" r="1"></circle><circle cx="10" cy="7" r="1"></circle><path d="M23,2H7C5.9,2,5,2.9,5,4v22c0,1.1,0.9,2,2,2h9v-2H7v-6h9v-2H7v-6h16v3h2V4C25,2.9,24.1,2,23,2z M7,10V4h16v6H7z"></path><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
