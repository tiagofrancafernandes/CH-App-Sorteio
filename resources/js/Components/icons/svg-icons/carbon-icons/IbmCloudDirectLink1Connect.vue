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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M27,29H13c-1.1,0-2-0.9-2-2v-4h2v4h14V13h-4v-2h4c1.1,0,2,0.9,2,2v14C29,28.1,28.1,29,27,29z"></path><path d="M20,17c-0.5,0-0.9,0.1-1.3,0.3l-4-4c0.2-0.4,0.3-0.8,0.3-1.3c0-1.7-1.3-3-3-3s-3,1.3-3,3s1.3,3,3,3c0.5,0,0.9-0.1,1.3-0.3 l4,4C17.1,19.1,17,19.5,17,20c0,1.7,1.3,3,3,3s3-1.3,3-3S21.7,17,20,17z M11,12c0-0.6,0.4-1,1-1s1,0.4,1,1s-0.4,1-1,1S11,12.6,11,12 z M20,21c-0.6,0-1-0.4-1-1s0.4-1,1-1s1,0.4,1,1S20.6,21,20,21z"></path><path d="M5,3h14c1.1,0,2,0.9,2,2v4h-2V5H5v14h4v2H5c-1.1,0-2-0.9-2-2V5C3,3.9,3.9,3,5,3z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
