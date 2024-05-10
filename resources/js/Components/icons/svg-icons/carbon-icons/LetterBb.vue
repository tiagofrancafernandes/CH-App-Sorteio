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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>letter--Bb</title><path d="M23,13H19V9H17V23h6a2,2,0,0,0,2-2V15A2,2,0,0,0,23,13Zm-4,8V15h4v6Z"></path><path d="M15,12a3,3,0,0,0-3-3H7V23h5a3,3,0,0,0,3-3V18a3,3,0,0,0-.78-2A3,3,0,0,0,15,14ZM9,11h3a1,1,0,0,1,1,1v2a1,1,0,0,1-1,1H9Zm4,9a1,1,0,0,1-1,1H9V17h3a1,1,0,0,1,1,1Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
