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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m30,23h-6c-1.103,0-2-.8975-2-2v-10c0-1.103.897-2,2-2h6v2h-6v10h6v2Z" style="stroke-width: 0px"></path><path class="cls-2" d="m18,9h-4c-1.103,0-2,.897-2,2v12h2v-5h4v5h2v-12c0-1.103-.897-2-2-2Zm-4,7v-5h4v5h-4Z" style="stroke-width: 0px"></path><polygon class="cls-2" points="8 9 6.4849 14 6 15.977 5.535 14 4 9 2 9 2 23 4 23 4 15 3.8415 13.0039 4.4212 15 6 19.6263 7.5788 15 8.1588 13 8 15 8 23 10 23 10 9 8 9" style="stroke-width: 0px"></polygon><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
