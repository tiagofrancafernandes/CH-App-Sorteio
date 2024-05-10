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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M26,16H22a2.002,2.002,0,0,0-2,2V30h2V25h4v5h2V18A2.002,2.002,0,0,0,26,16Zm-4,7V18h4v5Z"></path><path d="M16,27a10.9862,10.9862,0,0,1-9.2156-5H12V20H4v8H6V24.3149A13.0239,13.0239,0,0,0,16,29Z"></path><path d="M20,10h5.2155A10.9973,10.9973,0,0,0,5,16H3A13.0048,13.0048,0,0,1,26,7.6849V4h2v8H20Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
