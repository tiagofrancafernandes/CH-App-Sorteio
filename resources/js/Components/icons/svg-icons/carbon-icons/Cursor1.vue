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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>cursor--1</title><path d="M23,28a1,1,0,0,1-.71-.29l-6.13-6.14-3.33,5a1,1,0,0,1-1,.44,1,1,0,0,1-.81-.7l-6-20A1,1,0,0,1,6.29,5l20,6a1,1,0,0,1,.7.81,1,1,0,0,1-.44,1l-5,3.33,6.14,6.13a1,1,0,0,1,0,1.42l-4,4A1,1,0,0,1,23,28Zm0-2.41L25.59,23l-7.16-7.15,5.25-3.5L7.49,7.49l4.86,16.19,3.5-5.25Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
