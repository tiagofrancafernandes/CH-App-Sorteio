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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M16,24a8,8,0,1,1,8-8A8.0092,8.0092,0,0,1,16,24Zm0-14a6,6,0,1,0,6,6A6.0067,6.0067,0,0,0,16,10Z" transform="translate(0 0)"></path><path d="M30,14H27.8193A12.0112,12.0112,0,0,0,18,4.1807V2H14V4.1807A12.0112,12.0112,0,0,0,4.1807,14H2v4H4.1807A12.0112,12.0112,0,0,0,14,27.8193V30h4V27.8193A12.0112,12.0112,0,0,0,27.8193,18H30ZM16,26A10,10,0,1,1,26,16,10.0114,10.0114,0,0,1,16,26Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" transform="translate(32 32) rotate(-180)" style="fill: none"></rect></svg>

</template>
