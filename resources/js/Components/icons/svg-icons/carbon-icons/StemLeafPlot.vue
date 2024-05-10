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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>stem-leaf-plot</title><path d="M19,10a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,19,10Zm0-4a1,1,0,1,0,1,1A1.0011,1.0011,0,0,0,19,6Z"></path><path d="M19,19a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,19,19Zm0-4a1,1,0,1,0,1,1A1.0011,1.0011,0,0,0,19,15Z"></path><path d="M27,19a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,27,19Zm0-4a1,1,0,1,0,1,1A1.0011,1.0011,0,0,0,27,15Z"></path><path d="M19,28a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,19,28Zm0-4a1,1,0,1,0,1,1A1.0011,1.0011,0,0,0,19,24Z"></path><rect x="12" y="2" width="2" height="28"></rect><path d="M7,28a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,7,28Zm0-4a1,1,0,1,0,1,1A1.0011,1.0011,0,0,0,7,24Z"></path><path d="M7,19a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,7,19Zm0-4a1,1,0,1,0,1,1A1.0011,1.0011,0,0,0,7,15Z"></path><path d="M7,10a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,7,10ZM7,6A1,1,0,1,0,8,7,1.0011,1.0011,0,0,0,7,6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
