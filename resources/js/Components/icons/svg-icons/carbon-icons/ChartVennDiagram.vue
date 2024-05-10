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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>chart--venn-diagram</title><path d="M20,6a9.92,9.92,0,0,0-4,.84A9.92,9.92,0,0,0,12,6a10,10,0,0,0,0,20,9.92,9.92,0,0,0,4-.84A9.92,9.92,0,0,0,20,26,10,10,0,0,0,20,6ZM12,24A8,8,0,0,1,12,8a7.91,7.91,0,0,1,1.76.2,10,10,0,0,0,0,15.6A7.91,7.91,0,0,1,12,24Zm8-8a8,8,0,0,1-4,6.92A8,8,0,0,1,16,9.08,8,8,0,0,1,20,16Zm0,8a7.91,7.91,0,0,1-1.76-.2,10,10,0,0,0,0-15.6A7.91,7.91,0,0,1,20,8a8,8,0,0,1,0,16Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
