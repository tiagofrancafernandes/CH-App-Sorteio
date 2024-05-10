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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>eyedropper</title><rect x="2" y="27" width="3" height="3"></rect><path d="M29.71,7.29l-5-5a1,1,0,0,0-1.41,0h0L20,5.59l-1.29-1.3L17.29,5.71,18.59,7,8.29,17.29A1,1,0,0,0,8,18v1.59l-2.71,2.7a1,1,0,0,0,0,1.41h0l3,3a1,1,0,0,0,1.41,0h0L12.41,24H14a1,1,0,0,0,.71-.29L25,13.41l1.29,1.3,1.42-1.42L26.41,12l3.3-3.29a1,1,0,0,0,0-1.41ZM13.59,22h-2L9,24.59,7.41,23,10,20.41v-2l10-10L23.59,12ZM25,10.59,21.41,7,24,4.41,27.59,8Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
