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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>DOC</title><path d="M30,23H24a2.0023,2.0023,0,0,1-2-2V11a2.002,2.002,0,0,1,2-2h6v2H24V21h6Z"></path><path d="M18,23H14a2.0023,2.0023,0,0,1-2-2V11a2.002,2.002,0,0,1,2-2h4a2.002,2.002,0,0,1,2,2V21A2.0023,2.0023,0,0,1,18,23ZM14,11V21h4V11Z"></path><path d="M6,23H2V9H6a4.0045,4.0045,0,0,1,4,4v6A4.0045,4.0045,0,0,1,6,23ZM4,21H6a2.002,2.002,0,0,0,2-2V13a2.002,2.002,0,0,0-2-2H4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
