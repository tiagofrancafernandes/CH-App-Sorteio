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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>align--horizontal-center</title><path d="M24,18H17V14h3a2.0025,2.0025,0,0,0,2-2V8a2.0025,2.0025,0,0,0-2-2H17V2H15V6H12a2.0025,2.0025,0,0,0-2,2v4a2.0025,2.0025,0,0,0,2,2h3v4H8a2.0025,2.0025,0,0,0-2,2v4a2.0025,2.0025,0,0,0,2,2h7v4h2V26h7a2.0025,2.0025,0,0,0,2-2V20A2.0025,2.0025,0,0,0,24,18ZM12,8h8v4H12ZM24,24H8V20H24Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
