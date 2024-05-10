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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>face--add</title><path d="M16,22a6,6,0,0,1-5.14-2.92l-1.71,1a8,8,0,0,0,13.7,0l-1.71-1A6,6,0,0,1,16,22Z"></path><polygon points="30 4 26 4 26 0 24 0 24 4 20 4 20 6 24 6 24 10 26 10 26 6 30 6 30 4"></polygon><path d="M11.5,11A2.5,2.5,0,1,0,14,13.5,2.48,2.48,0,0,0,11.5,11Z"></path><path d="M20.5,11A2.5,2.5,0,1,0,23,13.5,2.48,2.48,0,0,0,20.5,11Z"></path><path d="M27.61,13A12.33,12.33,0,0,1,28,16,12,12,0,1,1,16,4V2A14,14,0,1,0,29.67,13Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
