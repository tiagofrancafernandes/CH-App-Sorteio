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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>pills--add</title><path d="M22,14a7.94,7.94,0,0,0-4,1.0825V9A7,7,0,0,0,4,9V23a6.9857,6.9857,0,0,0,12.2756,4.5768A7.9966,7.9966,0,1,0,22,14ZM11,4a5.0059,5.0059,0,0,1,5,5v6H6V9A5.0059,5.0059,0,0,1,11,4Zm0,24a5.0059,5.0059,0,0,1-5-5V17h9.765a7.9564,7.9564,0,0,0-.7239,8.9319A5.0147,5.0147,0,0,1,11,28Zm11,0a6,6,0,1,1,6-6A6.0066,6.0066,0,0,1,22,28Z" transform="translate(0 0)"></path><polygon points="25 21 23 21 23 19 21 19 21 21 19 21 19 23 21 23 21 25 23 25 23 23 25 23 25 21"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
