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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>flow--connection</title><path d="M28,18H22a2.0023,2.0023,0,0,0-2,2v2H14.4141L10,17.5859V12h2a2.0023,2.0023,0,0,0,2-2V4a2.0023,2.0023,0,0,0-2-2H6A2.0023,2.0023,0,0,0,4,4v6a2.0023,2.0023,0,0,0,2,2H8v5.5859L3.293,22.293a.9994.9994,0,0,0,0,1.414l5,5a.9995.9995,0,0,0,1.414,0L14.4141,24H20v2a2.0023,2.0023,0,0,0,2,2h6a2.0023,2.0023,0,0,0,2-2V20A2.0023,2.0023,0,0,0,28,18ZM6,4h6v6H6ZM9,26.5859,5.4141,23,9,19.4141,12.5859,23ZM22,26V20h6v6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
