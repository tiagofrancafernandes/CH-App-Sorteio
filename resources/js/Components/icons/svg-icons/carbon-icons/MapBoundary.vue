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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="12" y="10" width="2" height="4"></rect><rect x="18" y="18" width="4" height="2"></rect><polygon points="14 18 14 16 12 16 12 20 16 20 16 18 14 18"></polygon><rect x="16" y="4" width="12" height="12"></rect><polygon points="17.885 29.997 11.819 26.142 4 27.989 4 4 14 4 14 8 12 8 12 6 6 6 6 25.461 12.181 24.001 18.115 27.773 22.818 26 26 26 26 20 24 20 24 18 28 18 28 28 23.182 28 17.885 29.997"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
