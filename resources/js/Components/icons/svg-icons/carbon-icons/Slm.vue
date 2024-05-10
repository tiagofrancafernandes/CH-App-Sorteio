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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><polygon points="28,9 26.5,14 26,16 25.5,14 24,9 22,9 22,23 24,23 24,15 23.8,13 24.4,15 26,19.6 27.6,15 28.2,13 28,15 28,23 30,23 30,9 "></polygon><polygon points="14,21 14,9 12,9 12,23 20,23 20,21 "></polygon><path d="M8,23H2v-2h6v-4H4c-1.1,0-2-0.9-2-2v-4c0-1.1,0.9-2,2-2h6v2H4v4h4c1.1,0,2,0.9,2,2v4C10,22.1,9.1,23,8,23z"></path><rect id="_x3C_Transparent_Rectangle_x3E__363_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
