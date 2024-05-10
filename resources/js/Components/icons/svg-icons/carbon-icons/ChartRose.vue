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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>chart--rose</title><path d="M30,17A15.017,15.017,0,0,0,15,2H14V8.0591A9.0122,9.0122,0,0,0,6.0591,16H4v1A11.0109,11.0109,0,0,0,14,27.9492V30h1A13.0084,13.0084,0,0,0,27.9492,18H30ZM16,4.0381A13.0217,13.0217,0,0,1,27.9619,16H16ZM14,10.08V16H8.08A7.0037,7.0037,0,0,1,14,10.08ZM6.0552,18H14v7.939A9.0134,9.0134,0,0,1,6.0552,18ZM16,27.9551V18h9.9551A11.0191,11.0191,0,0,1,16,27.9551Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
