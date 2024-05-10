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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>carousel--vertical</title><path d="M26,10V22a2,2,0,0,1-2,2H8a2,2,0,0,1-2-2V10A2,2,0,0,1,8,8H24A2,2,0,0,1,26,10ZM8,22H24V10H8Z" transform="translate(0 0)"></path><path d="M24,28v4H22V28H10v4H8V28a2,2,0,0,1,2-2H22A2,2,0,0,1,24,28Z" transform="translate(0 0)"></path><path d="M24,0V4a2,2,0,0,1-2,2H10A2,2,0,0,1,8,4V0h2V4H22V0Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" transform="translate(0 32) rotate(-90)" style="fill:none"></rect></svg>

</template>
