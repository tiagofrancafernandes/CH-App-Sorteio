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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>bluetooth--off</title><path d="M28,26.59,5.41,4,4,5.41,14.59,16,7,23.59,8.41,25,15,18.41V29a1,1,0,0,0,.58.91A1.06,1.06,0,0,0,16,30a1,1,0,0,0,.65-.24l6.3-5.4L26.59,28Zm-11,.24V18.41l4.53,4.53Z"></path><path d="M17,12.75V5.17l4.53,3.89-4.11,4.11,1.41,1.41,4.88-4.87A1,1,0,0,0,24,9a1,1,0,0,0-.35-.72l-7-6a1,1,0,0,0-1.07-.15A1,1,0,0,0,15,3v7.75Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
