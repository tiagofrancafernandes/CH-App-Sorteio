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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>data--unstructured</title><path d="M6,24a2,2,0,1,1-2,2,2,2,0,0,1,2-2m0-2a4,4,0,1,0,4,4A4,4,0,0,0,6,22Z"></path><path d="M16,4a2,2,0,1,1-2,2,2,2,0,0,1,2-2m0-2a4,4,0,1,0,4,4A4,4,0,0,0,16,2Z"></path><path d="M26,4a2,2,0,1,1-2,2,2,2,0,0,1,2-2m0-2a4,4,0,1,0,4,4A4,4,0,0,0,26,2Z"></path><path d="M18,24v4H14V24h4m2-2H12v8h8Z"></path><path d="M27,22.14V17a2,2,0,0,0-2-2H7V10h3V2H2v8H5v5a2,2,0,0,0,2,2H25v5.14a4,4,0,1,0,2,0ZM4,4H8V8H4ZM26,28a2,2,0,1,1,2-2A2,2,0,0,1,26,28Z"></path><g id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;"><rect class="cls-1" width="32" height="32" style="fill:none"></rect></g></svg>

</template>
