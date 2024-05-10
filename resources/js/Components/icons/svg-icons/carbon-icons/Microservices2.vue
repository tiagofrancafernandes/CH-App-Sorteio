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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><switch><g><path d="M16 22v-6h-6v-6H2v20h20v-8h-6zm-2-4v4h-4v-4h4zM4 12h4v4H4v-4zm4 6v4H4v-4h4zM4 28v-4h4v4H4zm10 0h-4v-4h4v4zm6 0h-4v-4h4v4zM29.6 13.6 27 16.2V10h3V2h-8v8h3v6.2l-2.6-2.6L21 15l5 5 5-5-1.4-1.4zM24 4h4v4h-4V4z"></path><path style="fill:none" d="M0 0h32v32H0z"></path></g></switch></svg>

</template>
