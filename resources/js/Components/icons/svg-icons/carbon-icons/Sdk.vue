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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>SDK</title><polygon points="30 9 27.9 9 24 15.6 24 9 22 9 22 23 24 23 24 18.7 24.9 17.2 27.9 23 30 23 26.1 15.4 30 9"></polygon><path d="M16,23H12V9h4a4.0118,4.0118,0,0,1,4,4v6A4.0118,4.0118,0,0,1,16,23Zm-2-2h2a2.0059,2.0059,0,0,0,2-2V13a2.0059,2.0059,0,0,0-2-2H14Z"></path><path d="M8,23H2V21H8V17H4a2.0059,2.0059,0,0,1-2-2V11A2.0059,2.0059,0,0,1,4,9h6v2H4v4H8a2.0059,2.0059,0,0,1,2,2v4A2.0059,2.0059,0,0,1,8,23Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
