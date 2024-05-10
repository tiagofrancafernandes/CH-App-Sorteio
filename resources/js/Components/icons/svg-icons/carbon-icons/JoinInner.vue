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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>join--inner</title><path d="M20,6a9.9355,9.9355,0,0,0-4,.8418A9.999,9.999,0,1,0,16,25.16,9.998,9.998,0,1,0,20,6ZM12,24A8,8,0,1,1,13.7573,8.2017a9.9734,9.9734,0,0,0,0,15.5986A7.9919,7.9919,0,0,1,12,24Zm8,0a7.9919,7.9919,0,0,1-1.7573-.2,9.9734,9.9734,0,0,0,0-15.5986A7.9972,7.9972,0,1,1,20,24Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
