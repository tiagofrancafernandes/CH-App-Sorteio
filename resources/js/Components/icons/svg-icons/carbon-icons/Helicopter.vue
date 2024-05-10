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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>helicopter</title><path d="M30,8V6H8V8H18v4H4V8H2v8H4V14h6.2192l2.0533,8.2129A4.9923,4.9923,0,0,0,17.123,26H26a4.0045,4.0045,0,0,0,4-4V19.3623a2.0007,2.0007,0,0,0-.4639-1.28L25.0684,12.72A1.9968,1.9968,0,0,0,23.5317,12H20V8ZM26,24H17.123a2.9949,2.9949,0,0,1-2.91-2.2725L12.2808,14H18v6H28v2A2.0023,2.0023,0,0,1,26,24ZM23.5317,14l3.3333,4H20V14Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
