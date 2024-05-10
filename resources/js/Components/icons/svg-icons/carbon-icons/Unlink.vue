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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>unlink</title><rect x="5" y="3.59" width="2" height="4.83" transform="translate(-2.49 6) rotate(-45.01)"></rect><rect x="25" y="23.58" width="2" height="4.83" transform="translate(-10.77 25.99) rotate(-44.99)"></rect><rect x="11" y="2" width="2" height="4"></rect><rect x="2" y="11" width="4" height="2"></rect><rect x="26" y="19" width="4" height="2"></rect><rect x="19" y="26" width="2" height="4"></rect><path d="M16.58,21.07l-3.71,3.72a4,4,0,1,1-5.66-5.66l3.72-3.72L9.51,14,5.8,17.72a6,6,0,0,0-.06,8.54A6,6,0,0,0,10,28a6.07,6.07,0,0,0,4.32-1.8L18,22.49Z"></path><path d="M15.41,10.93l3.72-3.72a4,4,0,1,1,5.66,5.66l-3.72,3.72L22.49,18l3.71-3.72a6,6,0,0,0,.06-8.54A6,6,0,0,0,22,4a6.07,6.07,0,0,0-4.32,1.8L14,9.51Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
