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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>light</title><rect x="15" y="2" width="2" height="4.96"></rect><rect x="21.67" y="6.85" width="4.96" height="2" transform="translate(1.52 19.37) rotate(-45)"></rect><rect x="25.04" y="15" width="4.96" height="2"></rect><rect x="23.15" y="21.67" width="2" height="4.96" transform="translate(-10 24.15) rotate(-45)"></rect><rect x="15" y="25.04" width="2" height="4.96"></rect><rect x="5.37" y="23.15" width="4.96" height="2" transform="translate(-14.77 12.63) rotate(-45)"></rect><rect x="2" y="15" width="4.96" height="2"></rect><rect x="6.85" y="5.37" width="2" height="4.96" transform="translate(-3.25 7.85) rotate(-45)"></rect><path d="M16,12a4,4,0,1,1-4,4,4,4,0,0,1,4-4m0-2a6,6,0,1,0,6,6,6,6,0,0,0-6-6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
