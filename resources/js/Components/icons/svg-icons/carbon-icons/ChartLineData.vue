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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>chart--line</title><path d="M10.06,17.88A4.25,4.25,0,0,0,11,18a4,4,0,0,0,2.23-.68l3.22,2.87a3.88,3.88,0,0,0-.2,3.17A4,4,0,1,0,22.62,19l2.54-5.09a3.78,3.78,0,0,0,2.91-.53A4,4,0,1,0,23.38,13l-2.54,5.09A3.86,3.86,0,0,0,20,18a4,4,0,0,0-2.23.68l-3.22-2.87a3.88,3.88,0,0,0,.2-3.17A4,4,0,1,0,8.3,16.93L4,25V2H2V28a2,2,0,0,0,2,2H30V28H4.67ZM26,8a2,2,0,1,1-2,2A2,2,0,0,1,26,8ZM22,22a2,2,0,1,1-2-2A2,2,0,0,1,22,22ZM11,12a2,2,0,1,1-2,2A2,2,0,0,1,11,12Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
