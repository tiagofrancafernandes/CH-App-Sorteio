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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>TSV</title><polygon points="28 9 26 22 24 9 22 9 24.516 23 27.484 23 30 9 28 9"></polygon><path d="M18,23H12V21h6V17H14a2.002,2.002,0,0,1-2-2V11a2.002,2.002,0,0,1,2-2h6v2H14v4h4a2.002,2.002,0,0,1,2,2v4A2.002,2.002,0,0,1,18,23Z"></path><polygon points="2 11 5 11 5 23 7 23 7 11 10 11 10 9 2 9 2 11"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
