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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>americas</title><path d="M30,16a14.0313,14.0313,0,1,0-7.14,12.1914l.1165.0254.0249-.1113A13.9983,13.9983,0,0,0,30,16ZM4,16a11.9369,11.9369,0,0,1,.395-3H8.6382L13.63,17.16l-1.9092,2.5459a2.0088,2.0088,0,0,0,.1855,2.6142L14,24.4141v3.4052A12.0093,12.0093,0,0,1,4,16Zm9.32,4.9062L16.37,16.84,9.3618,11H5.1055A11.9619,11.9619,0,0,1,22.8838,6.1865L22.2793,8H16.5859L13.543,11.043l9.3535,8.3134L21.248,26.7749A11.9034,11.9034,0,0,1,16,28V23.5859Zm10.315,4.3443,1.2133-5.46a2.0007,2.0007,0,0,0-.6235-1.9277L16.457,10.957,17.4141,10h4.8652a1.9981,1.9981,0,0,0,1.8975-1.3677l.3532-1.06a11.9777,11.9777,0,0,1-.8947,17.6782Z" transform="translate(0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
