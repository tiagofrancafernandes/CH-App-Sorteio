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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="16" y="28" width="14" height="2"></rect><path d="M27,26h-8c-1.1028,0-2-.8972-2-2v-5c0-1.1028,.8972-2,2-2h8c1.1028,0,2,.8972,2,2v5c0,1.1028-.8972,2-2,2Zm-8-7v5h8v-5h-8Z"></path><path d="M15,23h-5c-1.1028,0-2-.8972-2-2v-4h2v4h5v2Z"></path><rect x="2" y="13" width="14" height="2"></rect><path d="M13,11H5c-1.1028,0-2-.8972-2-2V4c0-1.1028,.8972-2,2-2H13c1.1028,0,2,.8972,2,2v5c0,1.1028-.8972,2-2,2ZM5,4v5H13V4H5Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
