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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m24,24v6h6v-6h-6Zm4,4h-2v-2h2v2Z"></path><path d="m2,30h6v-6H2v6Zm2-4h2v2h-2v-2Z"></path><path d="m26,15h-9v-6.1631c1.4407-.4336,2.5-1.7571,2.5-3.3369,0-1.9297-1.5703-3.5-3.5-3.5s-3.5,1.5703-3.5,3.5c0,1.5798,1.0593,2.9033,2.5,3.3369v6.1631H6c-1.1025,0-2,.8972-2,2v5h2v-5h9v7h-2v6h6v-6h-2v-7h9v5h2v-5c0-1.1028-.8975-2-2-2ZM14.5,5.5c0-.8271.6729-1.5,1.5-1.5s1.5.6729,1.5,1.5-.6729,1.5-1.5,1.5-1.5-.6729-1.5-1.5Zm2.5,22.5h-2v-2h2v2Z"></path><path d="m26.5,9c1.9297,0,3.5-1.5703,3.5-3.5s-1.5703-3.5-3.5-3.5-3.5,1.5703-3.5,3.5,1.5703,3.5,3.5,3.5Zm0-5c.8271,0,1.5.6729,1.5,1.5s-.6729,1.5-1.5,1.5-1.5-.6729-1.5-1.5.6729-1.5,1.5-1.5Z"></path><path d="m5.5,9c1.9297,0,3.5-1.5703,3.5-3.5s-1.5703-3.5-3.5-3.5-3.5,1.5703-3.5,3.5,1.5703,3.5,3.5,3.5Zm0-5c.8271,0,1.5.6729,1.5,1.5s-.6729,1.5-1.5,1.5-1.5-.6729-1.5-1.5.6729-1.5,1.5-1.5Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
