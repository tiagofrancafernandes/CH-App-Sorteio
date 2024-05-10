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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect id="inner-path" class="cls-1" x="9" y="16" width="14" height="2" style="fill: none"></rect><rect id="inner-path-2" data-name="inner-path" class="cls-1" x="9" y="10" width="14" height="2" style="fill: none"></rect><path d="M26,2H6A2.0023,2.0023,0,0,0,4,4V17a10.9814,10.9814,0,0,0,5.8242,9.707L16,30l6.1758-3.293A10.9814,10.9814,0,0,0,28,17V4A2.0023,2.0023,0,0,0,26,2ZM23,18H9V16H23Zm0-6H9V10H23Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
