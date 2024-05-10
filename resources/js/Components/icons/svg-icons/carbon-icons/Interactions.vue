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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>interactions</title><path d="M26,18H22V14H20V28h6a2.0027,2.0027,0,0,0,2-2V20A2.0023,2.0023,0,0,0,26,18Zm-4,8V20h4v6Z"></path><polygon points="20 6.076 19.256 4.219 16 5.522 16 2 14 2 14 5.523 10.744 4.22 10 6.077 13.417 7.444 10.9 10.8 12.5 12 15 8.667 17.5 12 19.1 10.8 16.583 7.443 20 6.076"></polygon><path d="M10,18H5v2h5v2H6a2,2,0,0,0-2,2v2a2,2,0,0,0,2,2h6V20A2.0023,2.0023,0,0,0,10,18Zm0,8H6V24h4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
