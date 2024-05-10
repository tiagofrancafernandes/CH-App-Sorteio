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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>nominal</title><path d="M24,28a6,6,0,1,1,6-6A6.0069,6.0069,0,0,1,24,28Zm0-10a4,4,0,1,0,4,4A4.0045,4.0045,0,0,0,24,18Z"></path><path d="M8,28a6,6,0,1,1,6-6A6.0069,6.0069,0,0,1,8,28ZM8,18a4,4,0,1,0,4,4A4.0045,4.0045,0,0,0,8,18Z"></path><path d="M16,14a6,6,0,1,1,6-6A6.0069,6.0069,0,0,1,16,14ZM16,4a4,4,0,1,0,4,4A4.0045,4.0045,0,0,0,16,4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
