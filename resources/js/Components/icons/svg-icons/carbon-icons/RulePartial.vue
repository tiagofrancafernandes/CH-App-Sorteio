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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M23,16c-3.9,0-7,3.1-7,7s3.1,7,7,7s7-3.1,7-7S26.9,16,23,16z M23,28V18c2.8,0,5,2.2,5,5S25.8,28,23,28z"></path><rect x="8" y="16" width="6" height="2"></rect><rect x="8" y="10" width="12" height="2"></rect><path d="M26,4c0-1.1-0.9-2-2-2H4C2.9,2,2,2.9,2,4v13c0,4.1,2.2,7.8,5.8,9.7l5.2,2.8v-2.3l-4.2-2.3C5.8,23.4,4,20.3,4,17V4h20v9h2V4z "></path><rect id="_x3C_Transparent_Rectangle_x3E__155_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
