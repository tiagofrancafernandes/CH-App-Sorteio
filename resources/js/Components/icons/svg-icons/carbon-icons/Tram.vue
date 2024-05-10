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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>tram</title><path d="M21,6H17V4h6V2H9V4h6V6H11a5.0057,5.0057,0,0,0-5,5V22a4.99,4.99,0,0,0,3.582,4.77L8.1978,30h2.1757l1.2859-3h8.6812l1.2859,3h2.1757L22.418,26.77A4.99,4.99,0,0,0,26,22V11A5.0057,5.0057,0,0,0,21,6ZM11,8H21a2.9948,2.9948,0,0,1,2.8157,2H8.1843A2.9948,2.9948,0,0,1,11,8ZM24,21H21v2h2.8157A2.9948,2.9948,0,0,1,21,25H11a2.9948,2.9948,0,0,1-2.8157-2H11V21H8V19H24Zm0-4H8V12H24Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
