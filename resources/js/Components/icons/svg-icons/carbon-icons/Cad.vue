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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>CAD</title><path d="M18,9H14a2,2,0,0,0-2,2V23h2V18h4v5h2V11A2,2,0,0,0,18,9Zm-4,7V11h4v5Z"></path><path d="M26,23H22V9h4a4,4,0,0,1,4,4v6A4,4,0,0,1,26,23Zm-2-2h2a2,2,0,0,0,2-2V13a2,2,0,0,0-2-2H24Z"></path><path d="M10,23H4a2,2,0,0,1-2-2V11A2,2,0,0,1,4,9h6v2H4V21h6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
