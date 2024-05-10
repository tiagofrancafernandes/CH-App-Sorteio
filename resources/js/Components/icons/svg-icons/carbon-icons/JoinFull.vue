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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path id="inner-path" class="cls-1" d="M16,9.0752a7.9941,7.9941,0,0,1,0,13.85,7.9941,7.9941,0,0,1,0-13.85m0-2.2373a9.9953,9.9953,0,0,0,0,18.3242A9.9953,9.9953,0,0,0,16,6.8379Z" style="fill: none"></path><path d="M10,16a9.9976,9.9976,0,0,1,6-9.1621,10,10,0,1,0,0,18.3242A9.9976,9.9976,0,0,1,10,16Z"></path><path d="M16,9.0752a7.9941,7.9941,0,0,0,0,13.85,7.9941,7.9941,0,0,0,0-13.85Z"></path><path d="M20,6a9.9539,9.9539,0,0,0-4,.8379,9.9953,9.9953,0,0,1,0,18.3242A9.9988,9.9988,0,1,0,20,6Z"></path><rect id="_Transparent_Rectangle_" data-name=" Transparent Rectangle " class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
