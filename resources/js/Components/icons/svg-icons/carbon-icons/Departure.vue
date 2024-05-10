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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>departure</title><rect x="2" y="28" width="28" height="2"></rect><path d="M13.48,5.15l5.69,8.14.8,1.15,1.35-.36,4.52-1.21a2.13,2.13,0,0,1,1.12,0A1.84,1.84,0,0,1,28.23,14,1.87,1.87,0,0,1,27,16.45l-18.71,5a1.78,1.78,0,0,1-1,0A1.87,1.87,0,0,1,6,20.12l-.25-.93L5,16.38l-.74-2.74,1.44-.39L8,16.35l.81,1.08,1.31-.35,2.8-.75,1.94-.52-.52-1.93L12.08,5.52l1.4-.37M14.16,3a1.06,1.06,0,0,0-.5,0l-3.09.83A1,1,0,0,0,9.89,5l2.5,9.36-2.81.75L6.85,11.5a1,1,0,0,0-.52-.36,1.06,1.06,0,0,0-.5,0L2.72,12A1,1,0,0,0,2,13.16L3,16.9l.75,2.8.25.94a3.87,3.87,0,0,0,2.74,2.74,3.91,3.91,0,0,0,2,0l18.7-5a3.84,3.84,0,0,0,0-7.44,4.27,4.27,0,0,0-2.16,0l-4.51,1.21L14.7,3.41A1,1,0,0,0,14.16,3Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
