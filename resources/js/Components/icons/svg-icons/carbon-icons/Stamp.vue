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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>stamp</title><path d="M26,18H20V14.8982a7.4938,7.4938,0,0,1,1.1587-3.8542,5.9751,5.9751,0,0,0-1.3735-7.7006,5.9968,5.9968,0,0,0-9.6829,3.54,5.91,5.91,0,0,0,.7478,4.175A7.2573,7.2573,0,0,1,12,14.7942V18H6a2.002,2.002,0,0,0-2,2v4a2.0025,2.0025,0,0,0,2,2v2a2.0025,2.0025,0,0,0,2,2H24a2.0025,2.0025,0,0,0,2-2V26a2.0025,2.0025,0,0,0,2-2V20A2.002,2.002,0,0,0,26,18ZM12.07,7.244a3.9994,3.9994,0,1,1,7.3728,2.7731A9.76,9.76,0,0,0,18.0664,14H13.94a9.5433,9.5433,0,0,0-1.376-3.9736A3.9366,3.9366,0,0,1,12.07,7.244ZM18,16v2H14V16Zm6,12H8V26H24ZM6,24V20H26v4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
