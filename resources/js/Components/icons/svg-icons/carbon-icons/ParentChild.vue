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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>parent-child</title><path d="M28,12a2,2,0,0,0,2-2V4a2,2,0,0,0-2-2H4A2,2,0,0,0,2,4v6a2,2,0,0,0,2,2H15v4H9a2,2,0,0,0-2,2v4H4a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V24a2,2,0,0,0-2-2H9V18H23v4H20a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V24a2,2,0,0,0-2-2H25V18a2,2,0,0,0-2-2H17V12ZM12,28H4V24h8Zm16,0H20V24h8ZM4,4H28v6H4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
