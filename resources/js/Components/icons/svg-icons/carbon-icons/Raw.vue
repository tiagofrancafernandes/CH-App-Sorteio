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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>RAW</title><polygon points="29.2 9 28.86 17 28.6 21.54 28.19 18 27.51 12.54 25.49 12.54 24.81 18 24.4 21.54 24.14 17 23.8 9 22 9 23 23 25.27 23 26.03 18.07 26.49 14 26.5 13.97 26.51 14 26.97 18.07 27.73 23 30 23 31 9 29.2 9"></polygon><path d="M18,9H14a2,2,0,0,0-2,2V23h2V18h4v5h2V11A2,2,0,0,0,18,9Zm-4,7V11h4v5Z"></path><path d="M10,15V11A2,2,0,0,0,8,9H2V23H4V17H5.48l2.34,6H10L7.63,17H8A2,2,0,0,0,10,15ZM4,11H8v4H4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
