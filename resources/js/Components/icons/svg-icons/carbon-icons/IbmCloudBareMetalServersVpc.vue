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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="9" cy="26" r="1"></circle><path d="m4,24v4c0,1.1.9,2,2,2h12v-2H6v-4h12v-2H6c-1.1,0-2,.9-2,2Z"></path><path d="m4,13v5c0,1.1.9,2,2,2h8v-2H6v-5h-2Z"></path><circle cx="9" cy="16" r="1"></circle><path d="m28,19v-5c0-1.1-.9-2-2-2h-8v2h8v5h2Z"></path><path d="m28,8v-4c0-1.1-.9-2-2-2h-12v2h12v4h-12v2h12c1.1,0,2-.9,2-2Z"></path><path d="m23.41,22l-13.41-13.41V2H2v8h6.59l13.41,13.41v6.59h8v-8h-6.59Zm-15.41-14h-4v-4h4v4Zm20,20h-4v-4h4v4Z"></path><g id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;"><rect class="cls-1" width="32" height="32" style="fill: none"></rect></g></svg>

</template>
