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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>text--vertical-alignment</title><rect x="16" y="28" width="14" height="2"></rect><rect x="16" y="23" width="14" height="2"></rect><path d="M10.8458,30H13L8.64,20H6.36L2,30H4.1542l.8-2h5.0916ZM5.7541,26,7.5,21.6347,9.2459,26Z"></path><rect x="2" y="15" width="28" height="2"></rect><rect x="16" y="7" width="14" height="2"></rect><rect x="16" y="2" width="14" height="2"></rect><path d="M10.8458,12H13L8.64,2H6.36L2,12H4.1542l.8-2h5.0916ZM5.7541,8,7.5,3.6347,9.2459,8Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
