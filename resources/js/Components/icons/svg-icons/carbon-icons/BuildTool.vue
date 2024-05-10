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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M28,14h-1V7c0-1.1-0.9-2-2-2h-6v2h6v7h-1c-1.1,0-2,0.9-2,2v9H9.9c-0.4-1.4-1.5-2.5-2.9-2.9V7h6.2l-2.6,2.6L12,11l5-5l-5-5 l-1.4,1.4L13.2,5H7C5.9,5,5,5.9,5,7v15.1c-1.7,0.4-3,2-3,3.9c0,2.2,1.8,4,4,4c1.9,0,3.4-1.3,3.9-3H22v1c0,1.1,0.9,2,2,2h4 c1.1,0,2-0.9,2-2V16C30,14.9,29.1,14,28,14z M6,28c-1.1,0-2-0.9-2-2s0.9-2,2-2c1.1,0,2,0.9,2,2S7.1,28,6,28z M24,28V16h4v12H24z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
