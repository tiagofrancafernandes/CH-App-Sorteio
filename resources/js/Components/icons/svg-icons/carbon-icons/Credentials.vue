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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>credentials</title><path d="M16,22a4,4,0,1,0-4-4A4,4,0,0,0,16,22Zm0-6a2,2,0,1,1-2,2A2,2,0,0,1,16,16Z"></path><rect x="14" y="6" width="4" height="2"></rect><path d="M24,2H8A2.002,2.002,0,0,0,6,4V28a2.0023,2.0023,0,0,0,2,2H24a2.0027,2.0027,0,0,0,2-2V4A2.0023,2.0023,0,0,0,24,2ZM20,28H12V26a1,1,0,0,1,1-1h6a1,1,0,0,1,1,1Zm2,0V26a3,3,0,0,0-3-3H13a3,3,0,0,0-3,3v2H8V4H24V28Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
