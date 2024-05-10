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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>text-creation</title><path d="M27,22.14V9.86A4,4,0,1,0,22.14,5H9.86A4,4,0,1,0,5,9.86V22.14A4,4,0,1,0,9.86,27H22.14A4,4,0,1,0,27,22.14ZM26,4a2,2,0,1,1-2,2A2,2,0,0,1,26,4ZM4,6A2,2,0,1,1,6,8,2,2,0,0,1,4,6ZM6,28a2,2,0,1,1,2-2A2,2,0,0,1,6,28Zm16.14-3H9.86A4,4,0,0,0,7,22.14V9.86A4,4,0,0,0,9.86,7H22.14A4,4,0,0,0,25,9.86V22.14A4,4,0,0,0,22.14,25ZM26,28a2,2,0,1,1,2-2A2,2,0,0,1,26,28Z"></path><polygon points="21 11 11 11 11 13 15 13 15 22 17 22 17 13 21 13 21 11"></polygon><rect class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
