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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>network--1</title><path d="M16,20a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,16,20Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,16,14Z"></path><path d="M5,20a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,5,20Zm0-6a2,2,0,1,0,2,2A2.0023,2.0023,0,0,0,5,14Z"></path><path d="M10,31a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,10,31Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,10,25Z"></path><path d="M22,31a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,22,31Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,22,25Z"></path><path d="M27,20a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,27,20Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,27,14Z"></path><path d="M22,9a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,22,9Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,22,3Z"></path><path d="M10,9a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,10,9Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,10,3Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" transform="translate(32 32) rotate(180)" style="fill:none"></rect></svg>

</template>
