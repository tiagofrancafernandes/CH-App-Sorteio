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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>windy--dust</title><path d="M23,28a5.0057,5.0057,0,0,1-5-5h2a3,3,0,1,0,3-3H22V18h1a5,5,0,0,1,0,10Z"></path><rect x="16" y="18" width="4" height="2"></rect><rect x="10" y="18" width="4" height="2"></rect><rect x="4" y="18" width="4" height="2"></rect><path d="M21,15H20V13h1a3,3,0,1,0-3-3H16a5,5,0,1,1,5,5Z"></path><rect x="14" y="13" width="4" height="2"></rect><rect x="8" y="13" width="4" height="2"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
