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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>soccer</title><circle cx="17" cy="28" r="2"></circle><rect x="7.5501" y="17.5001" width="7.8997" height="1.9998" transform="translate(-9.7132 13.5503) rotate(-45)"></rect><path d="M28,16.584,19.4143,8H6v2H18.5857l3,3L6,28.5859,7.4141,30,23,14.415,26.584,18,23,21.5859,24.4141,23,28,19.416A2.0044,2.0044,0,0,0,28,16.584Z"></path><path d="M24.5,9A3.5,3.5,0,1,1,28,5.5,3.504,3.504,0,0,1,24.5,9Zm0-5A1.5,1.5,0,1,0,26,5.5,1.5017,1.5017,0,0,0,24.5,4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
