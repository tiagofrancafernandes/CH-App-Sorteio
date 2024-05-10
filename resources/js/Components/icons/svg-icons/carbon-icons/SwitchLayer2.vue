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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="16 26 16 24 5.83 24 8.41 21.41 7 20 2 25 7 30 8.41 28.59 5.83 26 16 26"></polygon><polygon points="16 14 16 12 5.83 12 8.41 9.41 7 8 2 13 7 18 8.41 16.59 5.83 14 16 14"></polygon><polygon points="16 6 16 8 26.17 8 23.59 10.59 25 12 30 7 25 2 23.59 3.41 26.17 6 16 6"></polygon><polygon points="16 18 16 20 26.17 20 23.59 22.59 25 24 30 19 25 14 23.59 15.41 26.17 18 16 18"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
