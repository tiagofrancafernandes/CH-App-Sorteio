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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M13,26H11a5.0057,5.0057,0,0,0-5-5V19A7.0078,7.0078,0,0,1,13,26Z" transform="translate(0 0)"></path><path d="M18,26H16A10.0113,10.0113,0,0,0,6,16V14A12.0137,12.0137,0,0,1,18,26Z" transform="translate(0 0)"></path><path d="M26,13a7.0078,7.0078,0,0,1-7-7h2a5.0057,5.0057,0,0,0,5,5Z" transform="translate(0 0)"></path><path d="M26,18A12.0137,12.0137,0,0,1,14,6h2A10.0113,10.0113,0,0,0,26,16Z" transform="translate(0 0)"></path><path d="M7.707,24.293a.9994.9994,0,0,0-1.414,0L2,28.5859,3.4143,30,7.707,25.707A.9994.9994,0,0,0,7.707,24.293Z" transform="translate(0 0)"></path><path d="M28.5859,2,24.293,6.293a1,1,0,0,0,1.414,1.414L30,3.4141Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
