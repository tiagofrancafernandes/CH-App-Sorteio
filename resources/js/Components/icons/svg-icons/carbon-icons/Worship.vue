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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>worship</title><path d="M26.5859,17,22,21.5859v0h0l-5-5a2.002,2.002,0,0,0-2.8286,0L9.585,21.1709A2.0031,2.0031,0,0,0,9.585,24l4.0009,4H6v2H16a1,1,0,0,0,.707-1.707L11,22.585,15.5852,18l5.7078,5.707a.9995.9995,0,0,0,1.414,0L28,18.4141Z"></path><path d="M21.5,17A3.5,3.5,0,1,1,25,13.5,3.5042,3.5042,0,0,1,21.5,17Zm0-5A1.5,1.5,0,1,0,23,13.5,1.5017,1.5017,0,0,0,21.5,12Z"></path><path d="M4,10.5977l12-6.462,12.5264,6.7452.9472-1.7618-13-7a1.0045,1.0045,0,0,0-.9472,0l-13,7A1,1,0,0,0,2,10V30H4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
