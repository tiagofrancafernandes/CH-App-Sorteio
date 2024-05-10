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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="24 20 24 24 20 24 20 28 16 28 16 30 22 30 22 26 26 26 26 22 30 22 30 20 24 20"></polygon><path d="M8,4h8v6c0,1.1025,.8972,2,2,2h6v4h2v-6c0-.2651-.1055-.5195-.293-.707l-7-7c-.1875-.1875-.4419-.293-.707-.293H8c-1.1028,0-2,.8975-2,2V28c0,1.1025,.8972,2,2,2h4v-2h-4V4Zm15.5857,6h-5.5857V4.4141l5.5857,5.5859Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
