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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>taxi</title><path d="M29.39,16.08,22.7,13.21,20.16,8.87l-.08-.12A2,2,0,0,0,18.52,8h-8a2,2,0,0,0-1.67.89L5.46,14H3a1,1,0,0,0-1,1v9a1,1,0,0,0,1,1H5.14a4,4,0,0,0,7.72,0h6.28a4,4,0,0,0,7.72,0H29a1,1,0,0,0,1-1V17A1,1,0,0,0,29.39,16.08ZM9,26a2,2,0,1,1,2-2A2,2,0,0,1,9,26Zm14,0a2,2,0,1,1,2-2A2,2,0,0,1,23,26Zm5-3H26.86a4,4,0,0,0-7.72,0H12.86a4,4,0,0,0-7.72,0H4V16H6a1,1,0,0,0,.83-.45L10.54,10h8l2.63,4.5a1,1,0,0,0,.47.42L28,17.66Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
