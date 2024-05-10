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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>rotate</title><path d="M17.91,26.82l.35,2a12.9,12.9,0,0,0,4.24-1.54l-1-1.73A10.88,10.88,0,0,1,17.91,26.82Z"></path><path d="M24.42,23.07,26,24.35a13,13,0,0,0,2.24-3.91l-1.87-.68A11,11,0,0,1,24.42,23.07Z"></path><path d="M9.5,27.25a12.9,12.9,0,0,0,4.24,1.54l.35-2a10.88,10.88,0,0,1-3.59-1.3Z"></path><path d="M5.67,19.76l-1.87.68A13,13,0,0,0,6,24.35l.32-.26,1.22-1h0a11,11,0,0,1-1.91-3.31Z"></path><path d="M29,16a12.85,12.85,0,0,0-.8-4.44l-1.87.68A11.18,11.18,0,0,1,27,16Z"></path><path d="M26,7.65a13,13,0,0,0-20,0V4H4v8h8V10H6.81A11,11,0,0,1,24.42,8.93Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
