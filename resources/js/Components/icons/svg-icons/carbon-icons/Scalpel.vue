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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>scalpel</title><path d="M28.83,5.17a4.1,4.1,0,0,0-5.66,0L.34,28H9.59a5,5,0,0,0,3.53-1.46L28.83,10.83a4,4,0,0,0,0-5.66ZM12.29,18.88l2.09-2.09,2.83,2.83-2.09,2.09Zm-.58,6.24A3,3,0,0,1,9.59,26H5.17l5.71-5.71,2.83,2.83ZM27.41,9.41l-8.79,8.8-2.83-2.83,8.8-8.79a2,2,0,0,1,2.82,0,2,2,0,0,1,0,2.82Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
