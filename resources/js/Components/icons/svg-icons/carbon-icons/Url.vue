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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon class="cls-2" points="24 21 24 9 22 9 22 23 30 23 30 21 24 21" style="stroke-width: 0px"></polygon><path class="cls-2" d="m20,15v-4c0-1.103-.8975-2-2-2h-6v14h2v-6h1.4807l2.3345,6h2.1453l-2.3331-6h.3726c1.1025,0,2-.8975,2-2Zm-6-4h4v4h-4v-4Z" style="stroke-width: 0px"></path><path class="cls-2" d="m8,23h-4c-1.103,0-2-.8975-2-2v-12h2v12h4v-12h2v12c0,1.1025-.897,2-2,2Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
