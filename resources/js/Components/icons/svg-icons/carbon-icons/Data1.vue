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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>data--1</title><rect x="15" y="6" width="13" height="2"></rect><rect x="15" y="24" width="13" height="2"></rect><rect x="4" y="15" width="13" height="2"></rect><path d="M7,11a4,4,0,1,1,4-4A4,4,0,0,1,7,11ZM7,5A2,2,0,1,0,9,7,2,2,0,0,0,7,5Z" transform="translate(0 0)"></path><path d="M7,29a4,4,0,1,1,4-4A4,4,0,0,1,7,29Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,7,23Z" transform="translate(0 0)"></path><path d="M25,20a4,4,0,1,1,4-4A4,4,0,0,1,25,20Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,25,14Z" transform="translate(0 0)"></path><g id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;"><rect class="cls-1" width="32" height="32" style="fill:none"></rect></g></svg>

</template>
