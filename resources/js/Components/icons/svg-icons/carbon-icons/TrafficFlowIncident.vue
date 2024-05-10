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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="26 9.42 24.59 8 22.005 10.585 22 10.58 21.995 10.585 19.42 8.01 18 9.42 20.58 12 18 14.58 19.41 16 21.995 13.415 22 13.42 22.005 13.415 24.58 15.99 26 14.58 23.42 12 26 9.42"></polygon><polygon points="14 17.42 12.59 16 10.005 18.585 10 18.58 9.995 18.585 7.42 16.01 6 17.42 8.58 20 6 22.58 7.41 24 9.995 21.415 10 21.42 10.005 21.415 12.58 23.99 14 22.58 11.42 20 14 17.42"></polygon><rect x="2" y="2" width="2" height="28"></rect><rect x="28" y="2" width="2" height="28"></rect><rect x="15" y="2" width="2" height="4"></rect><rect x="15" y="10" width="2" height="4"></rect><rect x="15" y="18" width="2" height="4"></rect><rect x="15" y="26" width="2" height="4"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
