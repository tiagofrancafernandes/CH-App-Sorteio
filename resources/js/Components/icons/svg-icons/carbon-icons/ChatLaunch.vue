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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="22 4 22 6 26.586 6 20 12.586 21.414 14 28 7.414 28 12 30 12 30 4 22 4"></polygon><path d="M28,16v4a1.9965,1.9965,0,0,1-2,2H20l-4,7,1.7358,1,3.4288-6H26a3.9992,3.9992,0,0,0,4-4V16Z"></path><path d="M4,20V8A1.9965,1.9965,0,0,1,6,6H18V4H6A3.9986,3.9986,0,0,0,2,8V20a3.9992,3.9992,0,0,0,4,4h9V22H6A1.9965,1.9965,0,0,1,4,20Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
