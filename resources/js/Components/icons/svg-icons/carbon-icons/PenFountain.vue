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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M29.707,5.293l-3-3a.9994.9994,0,0,0-1.414,0L19.5859,8H17.0947A11.0118,11.0118,0,0,0,6.7124,15.3662L2.0562,28.67a1,1,0,0,0,1.2744,1.2739l13.3037-4.6562A11.012,11.012,0,0,0,24,14.9053V12.4141L29.707,6.707A.9994.9994,0,0,0,29.707,5.293Zm-7.414,6A1,1,0,0,0,22,12v2.9053A9.01,9.01,0,0,1,15.9731,23.4l-9.1677,3.209L16,17.4141,14.5859,16,5.3914,25.1948,8.6,16.0269A9.01,9.01,0,0,1,17.0947,10H20a1,1,0,0,0,.707-.293L26,4.4141,27.5859,6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
