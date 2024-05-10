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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><polygon points="9,19 9,25 14,22 "></polygon><path d="M11,16c3.3,0,6,2.7,6,6s-2.7,6-6,6s-6-2.7-6-6S7.7,16,11,16 M11,14c-4.4,0-8,3.6-8,8s3.6,8,8,8s8-3.6,8-8S15.4,14,11,14 L11,14z"></path><path d="M4,6v6h22v14h-4v2h4c1.1,0,2-0.9,2-2V6c0-1.1-0.9-2-2-2H6C4.9,4,4,4.9,4,6z M6,10V6h20v4H6z"></path><rect id="_x3C_Transparent_Rectangle_x3E__363_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
