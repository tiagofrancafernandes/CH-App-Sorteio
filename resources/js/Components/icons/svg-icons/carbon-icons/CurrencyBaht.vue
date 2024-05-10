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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M21.4023,15.6426A4.9727,4.9727,0,0,0,23,12V11a5.0059,5.0059,0,0,0-5-5H17V3H15V6H10V26h5v3h2V26h2a5.0059,5.0059,0,0,0,5-5V20A4.9834,4.9834,0,0,0,21.4023,15.6426ZM12,8h6a3.0033,3.0033,0,0,1,3,3v1a3.0033,3.0033,0,0,1-3,3H12ZM22,21a3.0033,3.0033,0,0,1-3,3H12V17h7a3.0033,3.0033,0,0,1,3,3Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
