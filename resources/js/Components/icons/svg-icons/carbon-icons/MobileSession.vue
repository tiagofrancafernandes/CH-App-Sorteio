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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m24,18c-3.3083,0-6,2.6914-6,6s2.6917,6,6,6,6-2.6914,6-6-2.6917-6-6-6Zm0,10c-2.2056,0-4-1.7944-4-4s1.7944-4,4-4v4h4c0,2.2056-1.7944,4-4,4Z"></path><path d="m16,28h-7V8h14v7h2V4c0-1.103-.8975-2-2-2h-14c-1.103,0-2,.897-2,2v24c0,1.1025.897,2,2,2h7v-2ZM9,4h14v2h-14v-2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
