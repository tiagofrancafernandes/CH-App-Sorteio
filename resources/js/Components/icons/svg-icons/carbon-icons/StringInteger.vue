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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>string-integer</title><path d="M26,12H22v2h4v2H23v2h3v2H22v2h4a2.0027,2.0027,0,0,0,2-2V14A2.0023,2.0023,0,0,0,26,12Z"></path><path d="M19,22H13V18a2.002,2.002,0,0,1,2-2h2V14H13V12h4a2.0023,2.0023,0,0,1,2,2v2a2.0023,2.0023,0,0,1-2,2H15v2h4Z"></path><polygon points="8 20 8 12 6 12 6 13 4 13 4 15 6 15 6 20 4 20 4 22 10 22 10 20 8 20"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
