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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,4a2.0023,2.0023,0,0,0-2,2V8H24a3.4376,3.4376,0,0,1-3.0513-2.3164A1.007,1.007,0,0,0,20,5a.9894.9894,0,0,0-.9468.6787A3.44,3.44,0,0,1,16,8a3.4376,3.4376,0,0,1-3.0513-2.3164A1.007,1.007,0,0,0,12,5a.971.971,0,0,0-.9468.6787A3.44,3.44,0,0,1,8,8H6V6A2.0023,2.0023,0,0,0,4,4H2V6H4V26a2.0023,2.0023,0,0,0,2,2H26a2.0023,2.0023,0,0,0,2-2V6h2V4ZM6,26V22h4V20H6V16h4V14H6V10H8a4.9316,4.9316,0,0,0,4-1.9873,5.0192,5.0192,0,0,0,8,0A4.9316,4.9316,0,0,0,24,10h2V26Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
