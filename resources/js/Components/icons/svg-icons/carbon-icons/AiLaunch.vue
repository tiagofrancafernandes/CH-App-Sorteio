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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m15,19l-1.4141,1.4141,3.5859,3.5859H4v-13h-2v13c0,1.1046.8954,2,2,2h13.1719l-3.5859,3.5859,1.4141,1.4141,6-6-6-6Z" style="stroke-width: 0px"></path><path class="cls-2" d="m24,18v-2h2V4h-2v-2h6v2h-2v12h2v2h-6Z" style="stroke-width: 0px"></path><path class="cls-2" d="m21,18h2l-5.5-16-3,.0088-5.5,15.9912h2l1.3333-4h7.3335l1.3333,4Zm-8-6l3-9,3,9h-6Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" transform="translate(32 32) rotate(180)" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
