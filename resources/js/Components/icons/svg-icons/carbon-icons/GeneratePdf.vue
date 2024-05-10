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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>generate-pdf</title><path d="M24,24v4H8V24H6v4H6a2,2,0,0,0,2,2H24a2,2,0,0,0,2-2h0V24Z"></path><polygon points="21 21 19.586 19.586 17 22.172 17 14 15 14 15 22.172 12.414 19.586 11 21 16 26 21 21"></polygon><polygon points="28 4 28 2 22 2 22 12 24 12 24 8 27 8 27 6 24 6 24 4 28 4"></polygon><path d="M17,12H13V2h4a3.0033,3.0033,0,0,1,3,3V9A3.0033,3.0033,0,0,1,17,12Zm-2-2h2a1.0011,1.0011,0,0,0,1-1V5a1.0011,1.0011,0,0,0-1-1H15Z"></path><path d="M9,2H4V12H6V9H9a2.0027,2.0027,0,0,0,2-2V4A2.0023,2.0023,0,0,0,9,2ZM6,7V4H9l.001,3Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
