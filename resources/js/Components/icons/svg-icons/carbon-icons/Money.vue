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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>money</title><rect x="2" y="22" width="28" height="2"></rect><rect x="2" y="26" width="28" height="2"></rect><path d="M24,10a2,2,0,1,0,2,2,2,2,0,0,0-2-2Z"></path><path d="M16,16a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,16,16Zm0-6a2,2,0,1,0,2,2A2.002,2.002,0,0,0,16,10Z"></path><path d="M8,10a2,2,0,1,0,2,2,2,2,0,0,0-2-2Z"></path><path d="M28,20H4a2.0051,2.0051,0,0,1-2-2V6A2.0051,2.0051,0,0,1,4,4H28a2.0051,2.0051,0,0,1,2,2V18A2.0027,2.0027,0,0,1,28,20ZM28,6H4V18H28Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
