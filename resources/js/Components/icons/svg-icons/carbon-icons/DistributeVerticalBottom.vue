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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>distribute--vertical-bottom</title><rect x="2" y="28" width="28" height="2"></rect><path d="M24,26H8a2.0021,2.0021,0,0,1-2-2V20a2.0021,2.0021,0,0,1,2-2H24a2.0021,2.0021,0,0,1,2,2v4A2.0021,2.0021,0,0,1,24,26Zm0-6.0012L8,20v4H24Z"></path><rect x="2" y="12" width="28" height="2"></rect><path d="M20,10H12a2.0021,2.0021,0,0,1-2-2V4a2.0021,2.0021,0,0,1,2-2h8a2.0021,2.0021,0,0,1,2,2V8A2.0021,2.0021,0,0,1,20,10Zm0-6.0012L12,4V8h8Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
