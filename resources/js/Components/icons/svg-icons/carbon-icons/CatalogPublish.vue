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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><polygon points="20,20 21.4,21.4 18.8,24 28,24 28,26 18.8,26 21.4,28.6 20,30 15,25 "></polygon><rect x="14" y="15" width="8" height="2"></rect><rect x="14" y="8" width="8" height="2"></rect><path d="M13,28H8v-4h2v-2H8v-5h2v-2H8v-5h2V8H8V4h18v16h2V4c0-1.1-0.9-2-2-2H8C6.9,2,6,2.9,6,4v4H4v2h2v5H4v2h2v5H4v2h2v4 c0,1.1,0.9,2,2,2h5V28z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
