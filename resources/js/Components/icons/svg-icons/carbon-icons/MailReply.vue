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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>mail--reply</title><path d="M25,18l-1.4141,1.4141L26.1672,22H18a4,4,0,0,0,0,8h2V28H18a2,2,0,0,1,0-4h8.1672l-2.5827,2.5874L25,28l5-5Z"></path><path d="M10,22H4L3.9966,6.9064l11.4341,7.9159a1.0008,1.0008,0,0,0,1.1386,0L28,6.9086,28,16h2V6a2.0025,2.0025,0,0,0-2-2H4A2,2,0,0,0,2,5.9965V22a2.0026,2.0026,0,0,0,2,2h6ZM25.7986,6,16,12.7837,6.2014,6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
