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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>list--checked</title><rect x="16" y="8" width="14" height="2"></rect><rect x="16" y="22" width="14" height="2"></rect><path d="M10,14H4a2.0023,2.0023,0,0,1-2-2V6A2.0023,2.0023,0,0,1,4,4h6a2.0023,2.0023,0,0,1,2,2v6A2.0023,2.0023,0,0,1,10,14ZM4,6v6h6.0012L10,6Z"></path><path d="M10,28H4a2.0023,2.0023,0,0,1-2-2V20a2.0023,2.0023,0,0,1,2-2h6a2.0023,2.0023,0,0,1,2,2v6A2.0023,2.0023,0,0,1,10,28ZM4,20v6h6.0012L10,20Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
