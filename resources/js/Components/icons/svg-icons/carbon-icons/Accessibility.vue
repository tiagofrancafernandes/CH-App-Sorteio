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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>accessibility</title><path d="M29.55,26.11,26.5,27.63,23.66,21H15a2,2,0,0,1-2-2V13a2,2,0,0,1,4,0v4h7V15H19V13a4,4,0,0,0-8,0v1a9,9,0,1,0,8.77,11H17.71A7,7,0,1,1,11,16v3a4,4,0,0,0,4,4h7.34l3.16,7.37,4.95-2.48Z"></path><path d="M15.5,8A3.5,3.5,0,1,1,19,4.5,3.5,3.5,0,0,1,15.5,8Zm0-5A1.5,1.5,0,1,0,17,4.5,1.5,1.5,0,0,0,15.5,3Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
