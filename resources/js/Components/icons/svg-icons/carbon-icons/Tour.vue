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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m24,18l-4.7788-6.4019c-.7979-1.0562-1.2212-2.302-1.2212-3.5981,0-3.3083,2.6914-6,6-6s6,2.6917,6,6c0,1.2961-.4233,2.542-1.2246,3.6028l-4.7754,6.3972Zm0-14c-2.2056,0-4,1.7944-4,4,0,.8577.2837,1.6865.8203,2.3972l3.1797,4.2595,3.1763-4.2549c.54-.7153.8237-1.5442.8237-2.4019,0-2.2056-1.7944-4-4-4Z"></path><circle cx="24" cy="8" r="2"></circle><path d="m28,18v4H4V6h10v-2H4c-1.1045,0-2,.8955-2,2v16c0,1.1045.8955,2,2,2h8v4h-4v2h16v-2h-4v-4h8c1.1046,0,2-.8955,2-2v-4h-2Zm-10,10h-4v-4h4v4Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
