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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>face--cool</title><path d="M16,24a8,8,0,0,0,6.85-3.89l-1.71-1a6,6,0,0,1-10.28,0l-1.71,1A8,8,0,0,0,16,24Z" transform="translate(0)"></path><path d="M16,2A14,14,0,1,0,30,16,14,14,0,0,0,16,2Zm0,2a12,12,0,0,1,10.89,7H25a1,1,0,0,0-1-1H8a1,1,0,0,0-1,1H5.11A12,12,0,0,1,16,4Zm0,24A12,12,0,0,1,4,16a11.86,11.86,0,0,1,.4-3H7v2a2,2,0,0,0,2,2h3.31a2,2,0,0,0,2-1.67L14.83,12h2.34l.55,3.33a2,2,0,0,0,2,1.67H23a2,2,0,0,0,2-2V13h2.6a11.86,11.86,0,0,1,.4,3A12,12,0,0,1,16,28Z" transform="translate(0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
