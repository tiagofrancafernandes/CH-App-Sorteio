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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M11,16V11h1a4.0045,4.0045,0,0,0,4-4V4H13a3.9779,3.9779,0,0,0-2.7468,1.1067A6.0034,6.0034,0,0,0,5,2H2V5a6.0066,6.0066,0,0,0,6,6H9v5H2v2H16V16ZM13,6h1V7a2.002,2.002,0,0,1-2,2H11V8A2.002,2.002,0,0,1,13,6ZM8,9A4.0045,4.0045,0,0,1,4,5V4H5A4.0045,4.0045,0,0,1,9,8V9Z" transform="translate(0 0)"></path><rect x="2" y="21" width="14" height="2"></rect><rect x="2" y="26" width="14" height="2"></rect><path d="M25,30a4.9863,4.9863,0,0,1-3-8.98V15a3,3,0,0,1,6,0v6.02A4.9863,4.9863,0,0,1,25,30Zm0-16a1.0011,1.0011,0,0,0-1,1v7.13l-.4971.2893A2.9676,2.9676,0,0,0,22,25a3,3,0,0,0,6,0,2.9676,2.9676,0,0,0-1.5029-2.5811L26,22.13V15A1.0011,1.0011,0,0,0,25,14Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
