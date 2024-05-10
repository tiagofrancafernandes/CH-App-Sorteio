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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m29,12h-9V3h9v9Zm-7-2h5v-5h-5v5Z"></path><path d="m20,15v2h7v10h-10V3H5c-1.1028,0-2,.8975-2,2v22c0,1.1025.8972,2,2,2h22c1.1028,0,2-.8975,2-2v-12h-9Zm-13.5859,2h8.5859v8.5859l-8.5859-8.5859Zm8.5859-2H6.4141L15,6.4141v8.5859Zm-1.4141-10L5,13.5859V5h8.5859Zm-8.5859,13.4141l8.5859,8.5859H5v-8.5859Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
