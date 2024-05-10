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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>diagram</title><path d="M13,30A11,11,0,0,1,13,8a1,1,0,0,1,1,1v9h9a1,1,0,0,1,1,1A11,11,0,0,1,13,30ZM12,10.06A9,9,0,1,0,21.94,20H14a2,2,0,0,1-2-2Z"></path><path d="M28,14H19a2,2,0,0,1-2-2V3a1,1,0,0,1,1-1A11,11,0,0,1,29,13,1,1,0,0,1,28,14Zm-9-2h7.94A9,9,0,0,0,19,4.06Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
