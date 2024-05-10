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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="2" y="28" width="28" height="2"></rect><path d="M26,26H24a7.987,7.987,0,0,0-2.0371-5.3335l1.49-1.334A9.9835,9.9835,0,0,1,26,26Z"></path><path d="M16,26H14a9.9268,9.9268,0,0,1,3.7539-7.804A7.89,7.89,0,0,0,16,18a8.0092,8.0092,0,0,0-8,8H6A10.0113,10.0113,0,0,1,16,16a9.8923,9.8923,0,0,1,4.4458,1.0515,1,1,0,0,1,0,1.79A7.9567,7.9567,0,0,0,16,26Z"></path><polygon points="16 14 11 9 12.41 7.59 15 10.17 15 10 15 2 17 2 17 10 17 10.17 19.59 7.59 21 9 16 14"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
