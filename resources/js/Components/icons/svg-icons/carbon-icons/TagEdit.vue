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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M29.707,7.293l-3-3a.9994.9994,0,0,0-1.414,0L16,13.5859V18h4.4141L29.707,8.707A.9994.9994,0,0,0,29.707,7.293ZM19.5859,16H18V14.4141l5-5L24.5859,11ZM26,9.5859,24.4141,8,26,6.4141,27.5859,8Z" transform="translate(0 0)"></path><path d="M10,14a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,10,14Zm0-6a2,2,0,1,0,1.998,2.0044A2.002,2.002,0,0,0,10,8Z" transform="translate(0 0)"></path><path d="M27.0059,14.2354l-1.4141,1.414L28,18.0576,18.0579,28,4,13.9414V4h9.9417l4.4067,4.4067,1.4141-1.4145-4.407-4.4063A2,2,0,0,0,13.9414,2H4A2,2,0,0,0,2,4v9.9414a2,2,0,0,0,.5857,1.4141L16.6436,29.4146a2.001,2.001,0,0,0,2.8286,0l9.9424-9.9424a2.001,2.001,0,0,0,0-2.8286Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
