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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M4,2A2,2,0,0,0,2,4V20l1,2,1-2V4H8V14l1,2,1-2V2Z" transform="translate(0 0)"></path><path d="M28,2H14v8l1,2,1-2V4h2V17l1,2,1-2V4h4V14l1,2,1-2V4h2V24l1,2,1-2V4A2,2,0,0,0,28,2Z" transform="translate(0 0)"></path><polygon points="14 28 13 30 12 28 12 16 14 16 14 28"></polygon><polygon points="24 26 23 28 22 26 22 20 24 20 24 26"></polygon><polygon points="8 24 7 26 6 24 6 18 8 18 8 24"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
