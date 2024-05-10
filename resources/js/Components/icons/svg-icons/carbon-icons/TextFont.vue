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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M25,12H20v2h5a1.0008,1.0008,0,0,1,1,1v2H22a3.0033,3.0033,0,0,0-3,3v1a3.0033,3.0033,0,0,0,3,3h6V15A3.0033,3.0033,0,0,0,25,12ZM22,22a1.0008,1.0008,0,0,1-1-1V20a1.0008,1.0008,0,0,1,1-1h4v3Z"></path><path d="M16,24h2L12,7H10L4,24H6l1.6936-5h6.6135ZM8.3711,17l2.4966-7.3711.2668.0005L13.63,17Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
