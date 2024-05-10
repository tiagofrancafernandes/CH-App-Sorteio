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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><title>Asset 2</title><path d="M30,28.6L3.4,2L2,3.4l10.1,10.1L4,21.6V28h6.4l8.1-8.1L28.6,30L30,28.6z M9.6,26H6v-3.6l7.5-7.5l3.6,3.6L9.6,26z"></path><path d="M29.4,6.2L29.4,6.2l-3.6-3.6c-0.8-0.8-2-0.8-2.8,0l0,0l0,0l-8,8l1.4,1.4L20,8.4l3.6,3.6L20,15.6l1.4,1.4l8-8 C30.2,8.2,30.2,7,29.4,6.2L29.4,6.2z M25,10.6L21.4,7l3-3L28,7.6L25,10.6z"></path><rect class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
