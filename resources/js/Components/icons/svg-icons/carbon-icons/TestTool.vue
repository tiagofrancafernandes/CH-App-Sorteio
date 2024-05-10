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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><polygon points="23,9.2 20.4,6.6 19,8 23,12 30,5 28.6,3.6 "></polygon><polygon points="12,5.4 10.6,4 8,6.6 5.4,4 4,5.4 6.6,8 4,10.6 5.4,12 8,9.4 10.6,12 12,10.6 9.4,8 "></polygon><polygon points="12,21.4 10.6,20 8,22.6 5.4,20 4,21.4 6.6,24 4,26.6 5.4,28 8,25.4 10.6,28 12,26.6 9.4,24 "></polygon><polygon points="17,15 17,2 15,2 15,15 2,15 2,17 15,17 15,30 17,30 17,17 30,17 30,15 "></polygon><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
