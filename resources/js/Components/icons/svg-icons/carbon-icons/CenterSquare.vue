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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>center--square</title><polygon points="6 12 4 12 4 4 12 4 12 6 6 6 6 12"></polygon><polygon points="28 12 26 12 26 6 20 6 20 4 28 4 28 12"></polygon><polygon points="12 28 4 28 4 20 6 20 6 26 12 26 12 28"></polygon><polygon points="28 28 20 28 20 26 26 26 26 20 28 20 28 28"></polygon><rect x="15" y="10" width="2" height="4"></rect><rect x="10" y="15" width="4" height="2"></rect><rect x="18" y="15" width="4" height="2"></rect><rect x="15" y="18" width="2" height="4"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
