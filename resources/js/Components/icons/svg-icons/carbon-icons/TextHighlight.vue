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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>text-highlight</title><path d="M12,15H5a3,3,0,0,1-3-3V10A3,3,0,0,1,5,7h5V5A1,1,0,0,0,9,4H3V2H9a3,3,0,0,1,3,3ZM5,9a1,1,0,0,0-1,1v2a1,1,0,0,0,1,1h5V9Z"></path><path d="M20,23v2a1,1,0,0,0,1,1h5V22H21A1,1,0,0,0,20,23Z"></path><path d="M2,30H30V2Zm26-2H21a3,3,0,0,1-3-3V23a3,3,0,0,1,3-3h5V18a1,1,0,0,0-1-1H19V15h6a3,3,0,0,1,3,3Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
