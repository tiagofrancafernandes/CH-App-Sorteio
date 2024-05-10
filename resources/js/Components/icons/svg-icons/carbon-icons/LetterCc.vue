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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>letter--Cc</title><path d="M24,23H19a2,2,0,0,1-2-2V15a2,2,0,0,1,2-2h5v2H19v6h5Z"></path><path d="M15,23H9a2,2,0,0,1-2-2V11A2,2,0,0,1,9,9h6v2H9V21h6Z"></path><g id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;"><rect class="cls-1" width="32" height="32" style="fill:none"></rect></g></svg>

</template>
