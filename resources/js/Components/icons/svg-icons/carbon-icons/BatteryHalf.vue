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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>battery--half-full</title><path class="cls-1" d="M24,24H6a2,2,0,0,1-2-2V10A2,2,0,0,1,6,8H24a2,2,0,0,1,2,2v1h1a2,2,0,0,1,2,2v6a2,2,0,0,1-2,2H26v1A2,2,0,0,1,24,24ZM6,10V22H24V19h3V13H24V10Z" style="fill:currentColor"></path><rect class="cls-1" x="8" y="12" width="8" height="8" transform="translate(28 4) rotate(90)" style="fill:currentColor"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill:none"></rect></svg>

</template>
