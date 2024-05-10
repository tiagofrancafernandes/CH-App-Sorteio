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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>receipt</title><rect x="21" y="16" width="2" height="2"></rect><rect x="9" y="16" width="8" height="2"></rect><rect x="21" y="12" width="2" height="2"></rect><rect x="9" y="12" width="8" height="2"></rect><rect x="9" y="8" width="14" height="2"></rect><path d="M25,2H7A2.002,2.002,0,0,0,5,4V29a1,1,0,0,0,1,1H7a.9987.9987,0,0,0,.8-.4L10,26.667,12.2,29.6a1.0353,1.0353,0,0,0,1.6,0L16,26.667,18.2,29.6a1.0353,1.0353,0,0,0,1.6,0L22,26.667,24.2,29.6a.9993.9993,0,0,0,.8.4h1a1,1,0,0,0,1-1V4A2.0023,2.0023,0,0,0,25,2Zm0,25.333L22.8,24.4a1.0353,1.0353,0,0,0-1.6,0L19,27.333,16.8,24.4a1.0353,1.0353,0,0,0-1.6,0L13,27.333,10.8,24.4a1.0353,1.0353,0,0,0-1.6,0L7,27.333V4H25Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
