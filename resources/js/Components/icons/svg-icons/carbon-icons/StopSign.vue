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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M20.5857,29H11.4143A1.9865,1.9865,0,0,1,10,28.4141L3.5859,22A1.9865,1.9865,0,0,1,3,20.5857V11.4143A1.9865,1.9865,0,0,1,3.5859,10L10,3.5859A1.9865,1.9865,0,0,1,11.4143,3h9.1714A1.9865,1.9865,0,0,1,22,3.5859L28.4141,10A1.9865,1.9865,0,0,1,29,11.4143v9.1714A1.9865,1.9865,0,0,1,28.4141,22L22,28.4141A1.9865,1.9865,0,0,1,20.5857,29ZM11.4141,5,5,11.4141v9.1716L11.4141,27h9.1716L27,20.5859V11.4143L20.5859,5H11.4141Z"></path><rect id="_Transparent_Rectangle_" data-name=" Transparent Rectangle " class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
