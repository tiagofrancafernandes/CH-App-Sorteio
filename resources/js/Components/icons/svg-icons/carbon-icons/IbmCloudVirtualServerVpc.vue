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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="8" cy="26" r="1"></circle><path d="m5,30h22c1.1,0,2-.9,2-2v-4c0-1.1-.9-2-2-2H5c-1.1,0-2,.9-2,2v4c0,1.1.9,2,2,2Zm0-6h22v4H5v-4Z"></path><path d="m23,20h-14c-3.31,0-6-2.69-6-6,0-3.05,2.29-5.58,5.25-5.95.88-3.5,4.08-6.05,7.75-6.05s6.87,2.55,7.75,6.05c2.96.37,5.25,2.9,5.25,5.95,0,3.31-2.69,6-6,6Zm-14.05-10c-2.18.03-3.95,1.81-3.95,4,0,2.21,1.79,4,4,4h14c2.21,0,4-1.79,4-4,0-2.19-1.76-3.97-3.94-4l-.12.01-.88.02-.12-.88c-.43-2.94-2.98-5.15-5.94-5.15s-5.51,2.21-5.93,5.15l-.12.88-1-.03Z"></path><g id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;"><rect class="cls-1" width="32" height="32" style="fill: none"></rect></g></svg>

</template>
