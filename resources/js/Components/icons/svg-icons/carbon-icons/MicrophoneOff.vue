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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>microphone--off</title><path d="M9.18,18.57A7.41,7.41,0,0,1,9,17V14H7v3a8.84,8.84,0,0,0,.58,3.18Z"></path><path d="M13,15V7a3,3,0,0,1,6,0V8.75l2-2A5,5,0,0,0,11,7v8Z"></path><path d="M23,17a7,7,0,0,1-11.73,5.14l1.42-1.41A5,5,0,0,0,21,17V12.42l9-9L28.59,2,2,28.59,3.41,30l6.44-6.44A8.91,8.91,0,0,0,15,25.94V28H11v2H21V28H17V25.94A9,9,0,0,0,25,17V14H23Zm-4,0a3,3,0,0,1-4.9,2.31L19,14.42Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
