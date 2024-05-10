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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="26 8 22 4 18 8 19.41 9.42 21 7.83 21 18 23 18 23 7.83 24.58 9.41 26 8"></polygon><polygon points="12.59 22.58 11 24.17 11 14 9 14 9 24.17 7.42 22.59 6 24 10 28 14 24 12.59 22.58"></polygon><rect x="2" y="2" width="2" height="28"></rect><rect x="28" y="2" width="2" height="28"></rect><rect x="15" y="2" width="2" height="4"></rect><rect x="15" y="10" width="2" height="4"></rect><rect x="15" y="18" width="2" height="4"></rect><rect x="15" y="26" width="2" height="4"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
