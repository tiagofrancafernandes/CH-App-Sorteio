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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="26 18 24 18 22 21.897 20 18 18 18 20.905 23 18 28 20 28 22 24.201 24 28 26 28 23.098 23 26 18"></polygon><path class="cls-1" d="M19,6V4H13.9133a1.9906,1.9906,0,0,0-1.9919,1.8188L11.2686,13H7v2h4.0867l-1,11H5v2h5.0867a1.9906,1.9906,0,0,0,1.9919-1.8188L13.0952,15H18V13H13.2769l.6364-7Z" style="fill:currentColor"></path><rect id="_Transparent_Rectangle" data-name=" Transparent Rectangle" class="cls-2" width="32" height="32" style="fill: none"></rect></svg>

</template>
