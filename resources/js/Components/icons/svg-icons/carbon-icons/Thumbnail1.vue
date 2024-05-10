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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>thumbnail--1</title><path d="M8,30H4a2,2,0,0,1-2-2V24a2,2,0,0,1,2-2H8a2,2,0,0,1,2,2v4A2,2,0,0,1,8,30ZM4,24v4H8V24Z"></path><path d="M18,30H14a2,2,0,0,1-2-2V24a2,2,0,0,1,2-2h4a2,2,0,0,1,2,2v4A2,2,0,0,1,18,30Zm-4-6v4h4V24Z"></path><path d="M28,30H24a2,2,0,0,1-2-2V24a2,2,0,0,1,2-2h4a2,2,0,0,1,2,2v4A2,2,0,0,1,28,30Zm-4-6v4h4V24Z"></path><path d="M28,20H4a2,2,0,0,1-2-2V4A2,2,0,0,1,4,2H28a2,2,0,0,1,2,2V18A2,2,0,0,1,28,20ZM4,4V18H28V4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
