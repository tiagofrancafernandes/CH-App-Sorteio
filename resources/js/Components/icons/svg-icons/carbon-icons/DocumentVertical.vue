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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M16,14a4,4,0,1,1,4-4h0A4.0118,4.0118,0,0,1,16,14Zm0-6a2,2,0,1,0,2,2h0a2.0059,2.0059,0,0,0-2-2Z"></path><path d="M24,2H8A2.0023,2.0023,0,0,0,6,4V28a2.0023,2.0023,0,0,0,2,2H24a2.0023,2.0023,0,0,0,2-2V4A2.0023,2.0023,0,0,0,24,2ZM12,24V18a.9447.9447,0,0,1,1-1h6a.9447.9447,0,0,1,1,1v6H18v4H14V24Zm8,4V26a2.0058,2.0058,0,0,0,2-2V18a2.9463,2.9463,0,0,0-3-3H13a2.9463,2.9463,0,0,0-3,3v6a2.0058,2.0058,0,0,0,2,2v2H8V4H24V28Z"></path><rect id="_Transparent_Rectangle_" data-name=" Transparent Rectangle " class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
