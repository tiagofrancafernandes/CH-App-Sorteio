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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="21 27.18 18.41 24.59 17 26 21 30 28 23 26.59 21.59 21 27.18"></polygon><path d="M12,24a4,4,0,1,1,4-4A4.0042,4.0042,0,0,1,12,24Zm0-6a2,2,0,1,0,2,2A2.0023,2.0023,0,0,0,12,18Z"></path><path d="M26,2a3.86,3.86,0,0,0-1.85.48L7.76,10.96A9.99,9.99,0,0,0,12,30a9.3445,9.3445,0,0,0,2-.21V27.75A8.2289,8.2289,0,0,1,12,28a8,8,0,1,1,8-8,8.2656,8.2656,0,0,1-.06,1h2.78L29.56,7.79A3.9727,3.9727,0,0,0,26,2ZM21.86,18.34a10.0187,10.0187,0,0,0-8.22-8.19l8.38-4.34c0,.06-.02.12-.02.19a3.9989,3.9989,0,0,0,4,4c.06,0,.12-.02.19-.02ZM26,8a2,2,0,1,1,2-2A2.0058,2.0058,0,0,1,26,8Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
