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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>align--bottom-vertical</title><rect x="2" y="26" width="28" height="2"></rect><path d="M24,23H20a2.0023,2.0023,0,0,1-2-2V14a2.0023,2.0023,0,0,1,2-2h4a2.0023,2.0023,0,0,1,2,2v7A2.0023,2.0023,0,0,1,24,23Zm-4-9v7h4.0012L24,14Z"></path><path d="M12,23H8a2.0023,2.0023,0,0,1-2-2V6A2.0023,2.0023,0,0,1,8,4h4a2.0023,2.0023,0,0,1,2,2V21A2.0023,2.0023,0,0,1,12,23ZM8,6V21h4.0012L12,6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
