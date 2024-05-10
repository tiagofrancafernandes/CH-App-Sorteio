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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>insert</title><path d="M2,9h9V2H2ZM4,4H9V7H4Z"></path><path d="M2,19h9V12H2Zm2-5H9v3H4Z"></path><path d="M2,29h9V22H2Zm2-5H9v3H4Z"></path><path d="M27,9H18l3.41-3.59L20,4l-6,6,6,6,1.41-1.41L18,11h9a1,1,0,0,1,1,1V24a1,1,0,0,1-1,1H15v2H27a3,3,0,0,0,3-3V12A3,3,0,0,0,27,9Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
