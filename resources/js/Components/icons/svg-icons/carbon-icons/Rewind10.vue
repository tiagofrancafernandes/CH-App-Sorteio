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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>rewind--10</title><path d="M4,18A12,12,0,1,0,16,6H12V1L6,7l6,6V8h4A10,10,0,1,1,6,18Z"></path><path d="M19.63,22.13a2.84,2.84,0,0,1-1.28-.27,2.44,2.44,0,0,1-.89-.77,3.57,3.57,0,0,1-.52-1.25,7.69,7.69,0,0,1-.17-1.68,7.83,7.83,0,0,1,.17-1.68,3.65,3.65,0,0,1,.52-1.25,2.44,2.44,0,0,1,.89-.77,2.84,2.84,0,0,1,1.28-.27,2.44,2.44,0,0,1,2.16,1,5.23,5.23,0,0,1,.7,2.93,5.23,5.23,0,0,1-.7,2.93A2.44,2.44,0,0,1,19.63,22.13Zm0-1.22a1.07,1.07,0,0,0,1-.55A3.38,3.38,0,0,0,21,18.85V17.47a3.31,3.31,0,0,0-.29-1.5,1.23,1.23,0,0,0-2.06,0,3.31,3.31,0,0,0-.29,1.5v1.38a3.38,3.38,0,0,0,.29,1.51A1.06,1.06,0,0,0,19.63,20.91Z"></path><path d="M10.63,22V20.82h2V15.63l-1.86,1-.55-1.06,2.32-1.3H14v6.5h1.78V22Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
