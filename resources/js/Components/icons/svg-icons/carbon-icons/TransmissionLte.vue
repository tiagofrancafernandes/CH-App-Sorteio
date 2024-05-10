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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M10.57,30l.9333-2h8.9928l.9333,2h2.2072L17,15.7778V11H15v4.7778L8.3631,30ZM16,18.3647,17.6965,22h-3.393ZM13.37,24h5.26l.9333,2H12.4369Z" transform="translate(0 0)"></path><path d="M10.7832,9.3325a7.0007,7.0007,0,0,1,10.4341,0l-1.49,1.334a5,5,0,0,0-7.4537,0Z" transform="translate(0 0)"></path><path d="M7.1992,6.3994a11.0019,11.0019,0,0,1,17.6006,0L23.2,7.6a9.0009,9.0009,0,0,0-14.4014,0Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
