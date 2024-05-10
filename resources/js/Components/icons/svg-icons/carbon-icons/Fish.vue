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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>fish</title><circle cx="24" cy="6.9998" r="1"></circle><path d="M26,2A16.0183,16.0183,0,0,0,10,18v2H3a1,1,0,0,0-.707,1.707l8,8A1,1,0,0,0,12,29V22h2A16.0183,16.0183,0,0,0,30,6V2ZM10,26.5857,5.4141,22H10ZM12,20V18a13.9394,13.9394,0,0,1,3.908-9.6777l7.77,7.7695A13.94,13.94,0,0,1,14,20ZM28,6a13.9163,13.9163,0,0,1-2.98,8.6055L17.3945,6.98A13.9163,13.9163,0,0,1,26,4h2Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
