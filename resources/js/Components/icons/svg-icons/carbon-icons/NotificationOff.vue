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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M26,16.5859V13a9.9217,9.9217,0,0,0-1.0833-4.5024L30,3.4141,28.5859,2,2,28.5859,3.4141,30l6-6H11v1a5,5,0,0,0,10,0V24h7a1,1,0,0,0,1-1V20a1,1,0,0,0-.293-.707ZM19,25a3,3,0,0,1-6,0V24h6Zm8-3H11.4141L23.4119,10.0024A7.949,7.949,0,0,1,24,13v4a1,1,0,0,0,.293.707L27,20.4141Z"></path><path d="M7.707,17.707A1,1,0,0,0,8,17V13a8.0092,8.0092,0,0,1,8-8,7.9253,7.9253,0,0,1,4.9857,1.7681l1.4264-1.4263A9.934,9.934,0,0,0,17,3.0508V1H15V3.0508A10.0136,10.0136,0,0,0,6,13v3.5859l-3,3L4.4141,21Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
