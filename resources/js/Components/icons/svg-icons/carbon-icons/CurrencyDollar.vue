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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M23,20.5151c0-4.6152-3.78-5.1411-6.8171-5.563-3.31-.4609-5.1829-.86-5.1829-3.71C11,8.8491,13.5071,8,15.6538,8a6.7538,6.7538,0,0,1,5.5681,2.6279l1.5562-1.2558A8.6508,8.6508,0,0,0,17,6.0962V3H15V6.022c-3.6152.2192-6,2.26-6,5.22,0,4.73,3.83,5.2627,6.9075,5.69C19.16,17.3848,21,17.7744,21,20.5151,21,23.5474,17.8674,24,16,24c-3.4294,0-4.8782-.9639-6.2219-2.6279L8.2219,22.6279A8.4382,8.4382,0,0,0,15,25.9648V29h2V25.9551C20.7256,25.6509,23,23.6279,23,20.5151Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
