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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><g><polygon class="cls-1" points="19.5 22.5 19.5 21.5 22.5 21.5 22.5 10.5 19.5 10.5 19.5 9.5 23.5 9.5 23.5 21.5 26.5 21.5 26.5 22.5 19.5 22.5" style="fill: #fff"></polygon><path d="M23,10V22h0V10m1-1H19v2h3V21H19v2h8V21H24V9Z"></path></g><rect x="5" y="21" width="10" height="2"></rect><polygon points="15 13 11 13 11 9 9 9 9 13 5 13 5 15 9 15 9 19 11 19 11 15 15 15 15 13"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill: none"></rect></svg>

</template>
