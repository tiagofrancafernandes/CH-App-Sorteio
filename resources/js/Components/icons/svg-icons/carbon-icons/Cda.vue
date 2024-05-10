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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>CDA</title><path d="M28,9H24a2.002,2.002,0,0,0-2,2V23h2V18h4v5h2V11A2.0023,2.0023,0,0,0,28,9Zm-4,7V11h4v5Z"></path><path d="M16,23H12V9h4a4.0042,4.0042,0,0,1,4,4v6A4.0039,4.0039,0,0,1,16,23Zm-2-2h2a2.0027,2.0027,0,0,0,2-2V13a2.0023,2.0023,0,0,0-2-2H14Z"></path><path d="M10,23H4a2.0023,2.0023,0,0,1-2-2V11A2.002,2.002,0,0,1,4,9h6v2H4V21h6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
