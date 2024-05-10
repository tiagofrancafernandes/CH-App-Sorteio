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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>mail--all</title><polygon points="16.59 20.41 20.17 24 20.17 24 16.58 27.59 18 29 23 24 18 19 16.59 20.41"></polygon><polygon points="23.59 20.41 27.17 24 27.17 24 23.58 27.59 25 29 30 24 25 19 23.59 20.41"></polygon><path d="M14,23H4V7.91l11.43,7.91a1,1,0,0,0,1.14,0L28,7.91V17h2V7a2,2,0,0,0-2-2H4A2,2,0,0,0,2,7V23a2,2,0,0,0,2,2H14ZM25.8,7,16,13.78,6.2,7Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
