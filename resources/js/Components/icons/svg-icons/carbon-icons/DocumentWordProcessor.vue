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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="28.3 20 27.391 28.611 26 20 24 20 22.609 28.611 21.7 20 20 20 21.36 30 23.64 30 25 21.626 26.36 30 28.64 30 30 20 28.3 20"></polygon><path d="M25.707,9.293l-7-7A1,1,0,0,0,18,2H8A2.002,2.002,0,0,0,6,4V28a2.0023,2.0023,0,0,0,2,2h8V28H8V4h8v6a2.002,2.002,0,0,0,2,2h6v4h2V10A1,1,0,0,0,25.707,9.293ZM18,4.4141,23.5859,10H18Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
