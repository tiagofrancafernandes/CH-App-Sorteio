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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><polygon points="23,27.2 20.4,24.6 19,26 23,30 30,23 28.6,21.6 "></polygon><rect x="12" y="18" width="8" height="2"></rect><rect x="12" y="13" width="8" height="2"></rect><rect x="12" y="8" width="8" height="2"></rect><path d="M16,28H6v-4h2v-2H6v-5h2v-2H6v-5h2V8H6V4h18v16h2V4c0-1.1-0.9-2-2-2H6C4.9,2,4,2.9,4,4v4H2v2h2v5H2v2h2v5H2v2h2v4 c0,1.1,0.9,2,2,2h10V28z"></path><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
