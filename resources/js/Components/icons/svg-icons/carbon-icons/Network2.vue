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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>network--2</title><path d="M17,17h5.1421a4,4,0,1,0,0-2H17V7h5.1421a4,4,0,1,0,0-2H17a2.0023,2.0023,0,0,0-2,2v8H9.8579a4,4,0,1,0,0,2H15v8a2.0023,2.0023,0,0,0,2,2h5.1421a4,4,0,1,0,0-2H17Zm9-3a2,2,0,1,1-2,2A2.0023,2.0023,0,0,1,26,14ZM26,4a2,2,0,1,1-2,2A2.0023,2.0023,0,0,1,26,4ZM6,18a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,6,18Zm20,6a2,2,0,1,1-2,2A2.0023,2.0023,0,0,1,26,24Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" transform="translate(32 32) rotate(180)" style="fill:none"></rect></svg>

</template>
