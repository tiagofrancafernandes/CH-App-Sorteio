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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><polygon points="30,21.4 28.6,20 25,23.6 21.4,20 20,21.4 23.6,25 20,28.6 21.4,30 25,26.4 28.6,30 30,28.6 26.4,25 "></polygon><path d="M15.4,30L5,23.8c-0.6-0.4-1-1-1-1.7V9.9c0-0.7,0.4-1.4,1-1.7l10-5.9C15.3,2.1,15.6,2,16,2c0.4,0,0.7,0.1,1,0.3l10,5.9 c0.6,0.4,1,1,1,1.7V16h-2V9.9L16,4L6,9.9v12.2l10.5,6.2L15.4,30z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
