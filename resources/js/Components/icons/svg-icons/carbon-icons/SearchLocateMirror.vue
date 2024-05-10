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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M21,28.6l-4.7-4.7c1.1-1.4,1.7-3.1,1.7-4.9c0-4.4-3.6-8-8-8s-8,3.6-8,8s3.6,8,8,8c1.8,0,3.5-0.6,4.9-1.7l4.7,4.7L21,28.6z M10,25c-3.3,0-6-2.7-6-6s2.7-6,6-6s6,2.7,6,6S13.3,25,10,25z"></path><rect x="22" y="12" width="8" height="2"></rect><rect x="14" y="7" width="16" height="2"></rect><rect x="14" y="2" width="16" height="2"></rect><rect id="_x3C_Transparent_Rectangle_x3E__363_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
