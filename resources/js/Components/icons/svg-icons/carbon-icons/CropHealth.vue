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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="2" y="28" width="8" height="2"></rect><path d="M17,29a1,1,0,0,1-.7808-.3752L12.52,24H2V22H13a1,1,0,0,1,.7808.3752l3.146,3.9322,5.2412-7.8621A1,1,0,0,1,23.8,18.4L26.5,22H30v2H26a.9991.9991,0,0,1-.8-.4l-2.1523-2.8694-5.2159,7.824a.9986.9986,0,0,1-.7885.4443Z" transform="translate(0 0)"></path><path d="M11,16V11h1a4.0045,4.0045,0,0,0,4-4V4H13a3.9779,3.9779,0,0,0-2.7468,1.1067A6.0034,6.0034,0,0,0,5,2H2V5a6.0066,6.0066,0,0,0,6,6H9v5H2v2H16V16ZM13,6h1V7a2.002,2.002,0,0,1-2,2H11V8A2.002,2.002,0,0,1,13,6ZM8,9A4.0045,4.0045,0,0,1,4,5V4H5A4.0045,4.0045,0,0,1,9,8V9Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
