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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>fade</title><path d="M8.24,25.14,7,26.67a13.79,13.79,0,0,0,4.18,2.44l.69-1.87A12,12,0,0,1,8.24,25.14Z"></path><path d="M4.19,18l-2,.41A14.09,14.09,0,0,0,3.86,23L5.59,22A12.44,12.44,0,0,1,4.19,18Z"></path><path d="M11.82,4.76l-.69-1.87A13.79,13.79,0,0,0,7,5.33L8.24,6.86A12,12,0,0,1,11.82,4.76Z"></path><path d="M5.59,10,3.86,9a14.37,14.37,0,0,0-1.64,4.59l2,.34A12.05,12.05,0,0,1,5.59,10Z"></path><path d="M16,2V4a12,12,0,0,1,0,24v2A14,14,0,0,0,16,2Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
