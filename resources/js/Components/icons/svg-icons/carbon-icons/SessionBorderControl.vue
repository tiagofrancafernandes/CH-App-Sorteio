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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M26,8,24.59,9.41,27.17,12H16a5.967,5.967,0,0,0-4,1.54V6.83l2.59,2.58L16,8,11,3,6,8,7.41,9.41,10,6.83V18a5.969,5.969,0,0,0,1.54,4H4.83l2.58-2.59L6,18,1,23l5,5,1.41-1.41L4.83,24H16A5.99,5.99,0,0,0,20.46,14h6.71l-2.58,2.59L26,18l5-5ZM20,18a4,4,0,1,1-4-4A4.0045,4.0045,0,0,1,20,18Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
