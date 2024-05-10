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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M10,16a5.9908,5.9908,0,0,0,9.4712,4.8853L24.5859,26,26,24.5859l-5.115-5.1147A5.997,5.997,0,1,0,10,16Zm2,0a4,4,0,1,1,4,4A4.0045,4.0045,0,0,1,12,16Z"></path><path d="M29,7H22.54L20.83,4.45A.9946.9946,0,0,0,20,4H12a.9946.9946,0,0,0-.83.45L9.46,7H3A1.0031,1.0031,0,0,0,2,8V25a1.0031,1.0031,0,0,0,1,1h9V24H4V9h6a.9946.9946,0,0,0,.83-.45L12.54,6h6.92l1.71,2.55A.9946.9946,0,0,0,22,9h6V21h2V8A1.0031,1.0031,0,0,0,29,7Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
