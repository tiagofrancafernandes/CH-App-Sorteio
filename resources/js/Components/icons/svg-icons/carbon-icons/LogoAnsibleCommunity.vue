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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M27.8,27.7L17.5,3.1C17.2,2.4,16.6,2,15.9,2c-0.7,0-1.3,0.4-1.6,1.1L3,30h3.9l4.5-11.1l13.3,10.7c0.5,0.4,0.9,0.6,1.4,0.6 c1,0,1.9-0.7,1.9-1.8C28,28.2,27.9,28,27.8,27.7z M15.9,7.5l6.7,16.4L12.5,16L15.9,7.5z"></path><rect id="_x3C_Transparent_Rectangle_x3E__363_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
