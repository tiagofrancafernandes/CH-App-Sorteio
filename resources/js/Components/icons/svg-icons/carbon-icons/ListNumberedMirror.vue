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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M28,28h-6v-4c0-1.1,0.9-2,2-2h2v-2h-4v-2h4c1.1,0,2,0.9,2,2v2c0,1.1-0.9,2-2,2h-2v2h4V28z"></path><rect x="2" y="22" width="14" height="2"></rect><polygon points="26,12 26,4 24,4 24,5 22,5 22,7 24,7 24,12 22,12 22,14 24,14 26,14 28,14 28,12 "></polygon><rect x="2" y="8" width="14" height="2"></rect><rect id="_x3C_Transparent_Rectangle_x3E__363_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
