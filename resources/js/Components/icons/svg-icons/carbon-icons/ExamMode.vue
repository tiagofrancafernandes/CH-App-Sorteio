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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>exam-mode</title><path d="M25,23v3H7V16.83l3.59,3.58L12,19,6,13,0,19l1.41,1.41L5,16.83V26a2,2,0,0,0,2,2H25a2,2,0,0,0,2-2V23Z"></path><path d="M27,7v9.17l3.59-3.58L32,14l-6,6-6-6,1.41-1.41L25,16.17V7H13V5H25A2,2,0,0,1,27,7Z"></path><path d="M8,10H4A2,2,0,0,1,2,8V4A2,2,0,0,1,4,2H8a2,2,0,0,1,2,2V8A2,2,0,0,1,8,10ZM4,4V8H8V4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
