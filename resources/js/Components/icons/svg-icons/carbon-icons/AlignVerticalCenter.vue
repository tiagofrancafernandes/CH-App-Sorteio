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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>align--center-vertical</title><path d="M30,15H26V12a2.0025,2.0025,0,0,0-2-2H20a2.0025,2.0025,0,0,0-2,2v3H14V8a2.0025,2.0025,0,0,0-2-2H8A2.0025,2.0025,0,0,0,6,8v7H2v2H6v7a2.0025,2.0025,0,0,0,2,2h4a2.0025,2.0025,0,0,0,2-2V17h4v3a2.0025,2.0025,0,0,0,2,2h4a2.0025,2.0025,0,0,0,2-2V17h4ZM8,24V8h4l.0012,16Zm12-4V12h4l.0012,8Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
