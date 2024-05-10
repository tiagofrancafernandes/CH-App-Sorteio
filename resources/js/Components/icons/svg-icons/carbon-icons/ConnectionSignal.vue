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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>mobile-data</title><rect x="15" y="12" width="2" height="18"></rect><path d="M11.33,18.22a7,7,0,0,1,0-10.44l1.34,1.49a5,5,0,0,0,0,7.46Z"></path><path d="M20.67,18.22l-1.34-1.49a5,5,0,0,0,0-7.46l1.34-1.49a7,7,0,0,1,0,10.44Z"></path><path d="M8.4,21.8a11,11,0,0,1,0-17.6L9.6,5.8a9,9,0,0,0,0,14.4Z"></path><path d="M23.6,21.8l-1.2-1.6a9,9,0,0,0,0-14.4l1.2-1.6a11,11,0,0,1,0,17.6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
