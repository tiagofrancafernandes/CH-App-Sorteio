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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>text--leading</title><rect x="14" y="13" width="16" height="2"></rect><rect x="15" y="28" width="15" height="2"></rect><path d="M25.85,27H28L23.64,17H21.36L17,27h2.15l.8-2h5.1Zm-5.1-4,1.75-4.37L24.25,23Z"></path><path d="M25.85,12H28L23.64,2H21.36L17,12h2.15l.8-2h5.1Zm-5.1-4L22.5,3.63,24.25,8Z"></path><polygon points="6 15.83 8.58 18.41 10 17 6 13 2 17 3.41 18.42 6 15.83"></polygon><polygon points="6 27.17 3.42 24.59 2 26 6 30 10 26 8.59 24.58 6 27.17"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
