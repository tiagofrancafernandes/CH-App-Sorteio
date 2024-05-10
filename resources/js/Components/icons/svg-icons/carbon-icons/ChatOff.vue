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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,8V21h2V8a3.9986,3.9986,0,0,0-4-4H8.2429l2,2H26A1.9965,1.9965,0,0,1,28,8Z"></path><path d="M30,28.5859,3.4141,2,2,3.4141,3.5039,4.918A3.9181,3.9181,0,0,0,2,8V20a3.9992,3.9992,0,0,0,4,4h6V22H6a1.9965,1.9965,0,0,1-2-2V8a1.9814,1.9814,0,0,1,.9194-1.6665L20.5859,22H17l-4,7,1.7358,1,3.4288-6h4.4213l6,6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
