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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M24.8008,12.1362a8.8694,8.8694,0,0,0-.9795-2.5434L30,3.4142,28.5872,2,2,28.5872,3.4142,30l5-5H23.5a6.4974,6.4974,0,0,0,1.3008-12.8638ZM23.5,23H10.4141L22.3418,11.0723a6.9049,6.9049,0,0,1,.6006,2.0708l.0986.812.8154.0639A4.4975,4.4975,0,0,1,23.5,23Z"></path><path d="M4.2964,23.4487l1.4313-1.4311A4.4774,4.4774,0,0,1,8.144,14.019l.8155-.0639.0991-.812a6.9867,6.9867,0,0,1,10.63-5.0865l1.4431-1.4428A8.9859,8.9859,0,0,0,7.2,12.1362,6.4891,6.4891,0,0,0,4.2964,23.4487Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
