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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>meter--alt</title><path d="M30,20a13.8535,13.8535,0,0,0-2.2291-7.5288l-1.4452,1.4453A11.8917,11.8917,0,0,1,28,20Z"></path><path d="M28,9.414,26.5859,8,18.019,16.5669A3.9521,3.9521,0,0,0,16,16a4,4,0,1,0,4,4,3.9533,3.9533,0,0,0-.5669-2.0191ZM16,22a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,16,22Z"></path><path d="M16,8a11.9086,11.9086,0,0,1,6.0833,1.6743l1.4536-1.4536A13.9773,13.9773,0,0,0,2,20H4A12.0137,12.0137,0,0,1,16,8Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
