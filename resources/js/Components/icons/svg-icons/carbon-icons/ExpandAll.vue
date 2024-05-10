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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>expand-all</title><path d="M12,10H26a2.0025,2.0025,0,0,0,2-2V4a2.0025,2.0025,0,0,0-2-2H12a2.0025,2.0025,0,0,0-2,2V5H6V2H4V25a2.0025,2.0025,0,0,0,2,2h4v1a2.0025,2.0025,0,0,0,2,2H26a2.0025,2.0025,0,0,0,2-2V24a2.0025,2.0025,0,0,0-2-2H12a2.0025,2.0025,0,0,0-2,2v1H6V17h4v1a2.0025,2.0025,0,0,0,2,2H26a2.0025,2.0025,0,0,0,2-2V14a2.0025,2.0025,0,0,0-2-2H12a2.0025,2.0025,0,0,0-2,2v1H6V7h4V8A2.0025,2.0025,0,0,0,12,10Zm0-6H26l.0012,4H12Zm0,20H26l.0012,4H12Zm0-10H26l.0012,4H12Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
