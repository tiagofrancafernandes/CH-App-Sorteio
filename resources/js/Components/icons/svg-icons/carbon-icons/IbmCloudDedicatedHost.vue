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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="9" cy="6" r="1"></circle><path d="M26,2H6A2,2,0,0,0,4,4V8a2,2,0,0,0,2,2h9v4h2V10h9a2,2,0,0,0,2-2V4A2,2,0,0,0,26,2Zm0,6H6V4H26Z" transform="translate(0 0)"></path><polygon points="17 28 17 26 15 26 15 28 4 28 4 30 28 30 28 28 17 28"></polygon><circle id="machine" cx="9" cy="20" r="1"></circle><path id="dedicated_host" data-name="dedicated host" d="M6,24H26a2,2,0,0,0,2-2V18a2,2,0,0,0-2-2H6a2,2,0,0,0-2,2v4A2,2,0,0,0,6,24Zm0-6H26v4H6Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
