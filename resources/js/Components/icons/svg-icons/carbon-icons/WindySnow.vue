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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>windy--snow</title><path d="M25,28a5.0057,5.0057,0,0,1-5-5h2a3,3,0,1,0,3-3H6V18H25a5,5,0,0,1,0,10Z"></path><path d="M23,15H10V13H23a3,3,0,1,0-3-3H18a5,5,0,1,1,5,5Z"></path><rect x="11" y="23" width="2" height="2"></rect><rect x="13" y="25" width="2" height="2"></rect><rect x="15" y="27" width="2" height="2"></rect><rect x="15" y="23" width="2" height="2"></rect><rect x="11" y="27" width="2" height="2"></rect><rect x="6" y="4" width="2" height="2"></rect><rect x="8" y="6" width="2" height="2"></rect><rect x="10" y="8" width="2" height="2"></rect><rect x="10" y="4" width="2" height="2"></rect><rect x="6" y="8" width="2" height="2"></rect><rect x="2" y="26" width="2" height="2"></rect><rect x="4" y="28" width="2" height="2"></rect><rect x="6" y="30" width="2" height="2"></rect><rect x="6" y="26" width="2" height="2"></rect><rect x="2" y="30" width="2" height="2"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
