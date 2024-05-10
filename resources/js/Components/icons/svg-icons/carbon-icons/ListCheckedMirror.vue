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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><polygon points="30,19.4 28.6,18 22,24.6 19.4,22 18,23.4 22,27.4 "></polygon><rect x="2" y="22" width="14" height="2"></rect><polygon points="30,5.4 28.6,4 22,10.6 19.4,8 18,9.4 22,13.4 "></polygon><rect x="2" y="8" width="14" height="2"></rect><rect id="_x3C_Transparent_Rectangle_x3E__363_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
