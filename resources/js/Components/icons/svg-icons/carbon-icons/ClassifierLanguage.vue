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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>classifier--language</title><path d="M30,10V2H22v8h3v4H23v2h7V14H27V10ZM24,4h4V8H24Z"></path><polygon points="20 23.41 18.59 22 16 24.59 13.41 22 12 23.41 14.59 26 12 28.59 13.41 30 16 27.41 18.59 30 20 28.59 17.41 26 20 23.41"></polygon><polygon points="20 14 12 14 12 16 15 16 15 21 17 21 17 16 20 16 20 14"></polygon><path d="M7,9.86a4,4,0,1,0-2,0V14H2v2H9V14H7ZM4,6A2,2,0,1,1,6,8,2,2,0,0,1,4,6Z"></path><rect id="_Transparent_Rectangle_" data-name=" &lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
