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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>string-text</title><path d="M29,22H24a2.0027,2.0027,0,0,1-2-2V14a2.0023,2.0023,0,0,1,2-2h5v2H24v6h5Z"></path><path d="M18,12H14V8H12V22h6a2.0027,2.0027,0,0,0,2-2V14A2.0023,2.0023,0,0,0,18,12Zm-4,8V14h4v6Z"></path><path d="M8,12H3v2H8v2H4a2,2,0,0,0-2,2v2a2,2,0,0,0,2,2h6V14A2.0023,2.0023,0,0,0,8,12Zm0,8H4V18H8Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
