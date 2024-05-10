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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M28,2H18c-1.1,0-2,0.9-2,2v6c0,1.1,0.9,2,2,2h2.4l1.7,3l1.7-1l-2.3-4H18V4h10v6h-3v2h3c1.1,0,2-0.9,2-2V4 C30,2.9,29.1,2,28,2z"></path><path d="M14.7,31L13,30l3.5-6H22c1.1,0,2-0.9,2-2v-5h2v5c0,2.2-1.8,4-4,4h-4.4L14.7,31z"></path><circle cx="10" cy="17" r="1"></circle><circle cx="14" cy="17" r="1"></circle><circle cx="18" cy="17" r="1"></circle><path d="M12,26H6c-2.2,0-4-1.8-4-4V12c0-2.2,1.8-4,4-4h8v2H6c-1.1,0-2,0.9-2,2v10c0,1.1,0.9,2,2,2h6V26z"></path><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
