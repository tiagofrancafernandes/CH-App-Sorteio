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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>character-patterns</title><path d="M6,26V17.8281l-3.5859,3.586L1,20l6-6,6,6-1.4141,1.4141L8,17.8281V26H18v2H8A2.0024,2.0024,0,0,1,6,26Z" transform="translate(0)"></path><polygon points="30 22 30 20 22 20 22 22 27.5 22 22 28 22 30 30 30 30 28 24.507 28 30 22"></polygon><path d="M26,6v8.1719l3.5859-3.586L31,12l-6,6-6-6,1.4141-1.4141L24,14.1719V6H14V4H24A2.0024,2.0024,0,0,1,26,6Z" transform="translate(0)"></path><path d="M8,2H3V4H8V6H4A2,2,0,0,0,2,8v2a2,2,0,0,0,2,2h6V4A2.0023,2.0023,0,0,0,8,2Zm0,8H4V8H8Z" transform="translate(0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
