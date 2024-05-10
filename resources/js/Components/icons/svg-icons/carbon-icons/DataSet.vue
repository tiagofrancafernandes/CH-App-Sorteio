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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="25 12 25 3 23 3 23 5 20 5 20 7 23 7 23 12 20 12 20 14 28 14 28 12 25 12"></polygon><path d="m8.5,5c1.9299,0,3.5,1.5701,3.5,3.5s-1.5701,3.5-3.5,3.5-3.5-1.5701-3.5-3.5,1.5701-3.5,3.5-3.5m0-2c-3.0376,0-5.5,2.4624-5.5,5.5s2.4624,5.5,5.5,5.5,5.5-2.4624,5.5-5.5-2.4624-5.5-5.5-5.5h0Z"></path><path d="m8.5,20c1.9299,0,3.5,1.5701,3.5,3.5s-1.5701,3.5-3.5,3.5-3.5-1.5701-3.5-3.5,1.5701-3.5,3.5-3.5m0-2c-3.0376,0-5.5,2.4624-5.5,5.5s2.4624,5.5,5.5,5.5,5.5-2.4624,5.5-5.5-2.4624-5.5-5.5-5.5h0Z"></path><path d="m23.5,20c1.9299,0,3.5,1.5701,3.5,3.5s-1.5701,3.5-3.5,3.5-3.5-1.5701-3.5-3.5,1.5701-3.5,3.5-3.5m0-2c-3.0376,0-5.5,2.4624-5.5,5.5s2.4624,5.5,5.5,5.5,5.5-2.4624,5.5-5.5-2.4624-5.5-5.5-5.5h0Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
