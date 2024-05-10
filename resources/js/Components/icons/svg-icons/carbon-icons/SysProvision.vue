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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>sys-provision</title><polygon points="21 20 21 30 30 25 21 20"></polygon><circle cx="14" cy="14" r="2"></circle><path d="M14,20a6,6,0,1,1,6-6A6.0066,6.0066,0,0,1,14,20Zm0-10a4,4,0,1,0,4,4A4.0045,4.0045,0,0,0,14,10Z"></path><path d="M25.9512,12.91l-.0064,0A12.05,12.05,0,1,0,17,25.605V23.5386a9.9813,9.9813,0,1,1,6.6235-6.81l1.9248.544A12.0341,12.0341,0,0,0,26,14Q26,13.4492,25.9512,12.91Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
