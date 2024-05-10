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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="9" cy="26" r="1"></circle><path d="m26,30H6c-1.1041-.0012-1.9988-.8959-2-2v-4c.0012-1.1041.8959-1.9988,2-2h20c1.1041.0012,1.9988.8959,2,2v4c-.0012,1.1041-.8959,1.9988-2,2Zm-20-6v4h20v-4H6Z"></path><circle cx="9" cy="16" r="1"></circle><path d="m26,20H6c-1.1041-.0012-1.9988-.8959-2-2v-4c.0012-1.1041.8959-1.9988,2-2h20c1.1041.0012,1.9988.8959,2,2v4c-.0012,1.1041-.8959,1.9988-2,2ZM6,14v4h20v-4H6Z"></path><circle cx="9" cy="6" r="1"></circle><path d="m26,10H6c-1.1041-.0012-1.9988-.8959-2-2v-4c.0012-1.1041.8959-1.9988,2-2h20c1.1041.0012,1.9988.8959,2,2v4c-.0012,1.1041-.8959,1.9988-2,2ZM6,4v4h20v-4H6Z"></path><g id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;"><rect class="cls-1" width="32" height="32" style="fill: none"></rect></g></svg>

</template>
