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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M29,21.2783V19a4,4,0,0,0-8,0v2.2783A1.9935,1.9935,0,0,0,20,23v5a2.0025,2.0025,0,0,0,2,2h6a2.0025,2.0025,0,0,0,2-2V23A1.9935,1.9935,0,0,0,29,21.2783ZM25,17a2.0025,2.0025,0,0,1,2,2v2H23V19A2.0025,2.0025,0,0,1,25,17ZM22,28V23h6v5Z"></path><rect x="2" y="2" width="2" height="4"></rect><rect x="14" y="2" width="2" height="4"></rect><rect x="18" y="2" width="2" height="4"></rect><rect x="2" y="8" width="2" height="8"></rect><rect x="2" y="18" width="2" height="8"></rect><rect x="14" y="18" width="2" height="8"></rect><rect x="6" y="8" width="2" height="8"></rect><rect x="18" y="8" width="2" height="6"></rect><path d="M10,26H8a2.0023,2.0023,0,0,1-2-2V20a2.0023,2.0023,0,0,1,2-2h2a2.0023,2.0023,0,0,1,2,2v4A2.0023,2.0023,0,0,1,10,26ZM8,20v4h2V20Z"></path><path d="M14,16H12a2.0023,2.0023,0,0,1-2-2V10a2.0023,2.0023,0,0,1,2-2h2a2.0023,2.0023,0,0,1,2,2v4A2.0023,2.0023,0,0,1,14,16Zm-2-6v4h2V10Z"></path><path d="M10,6H8A2.0023,2.0023,0,0,1,6,4V2H8V4h2V2h2V4A2.0023,2.0023,0,0,1,10,6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
