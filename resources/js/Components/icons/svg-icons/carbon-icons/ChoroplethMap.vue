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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M29.2427,4.03l-8-2a1.0065,1.0065,0,0,0-.6143.0415l-9.7,3.88L3.2427,4.03A1,1,0,0,0,2,5V27a1,1,0,0,0,.7573.97l8,2A1.0244,1.0244,0,0,0,11,30a.9953.9953,0,0,0,.3716-.0718l9.7-3.88,7.686,1.9219A1,1,0,0,0,30,27V5A1,1,0,0,0,29.2427,4.03ZM28,11H22V4.2806l6,1.5ZM10,19H4V13h6Zm2-8V7.6771l8-3.2V11Zm8,2v6H12V13Zm-8,8h8v3.3227l-8,3.2Zm10-8h6v6H22ZM10,7.7806V11H4V6.2806ZM4,21h6v6.7192l-6-1.5Zm18,3.2187V21h6v4.7192Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
