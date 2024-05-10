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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M16,7a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,16,7Zm0-4a1,1,0,1,0,1,1A1.001,1.001,0,0,0,16,3Z"></path><path d="M11,30a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,11,30Zm0-4a1,1,0,1,0,1,1A1.001,1.001,0,0,0,11,26Z"></path><path d="M7,11a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,7,11ZM7,7A1,1,0,1,0,8,8,1.001,1.001,0,0,0,7,7Z"></path><path d="M21,30a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,21,30Zm0-4a1,1,0,1,0,1,1A1.001,1.001,0,0,0,21,26Z"></path><path d="M25,11a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,25,11Zm0-4a1,1,0,1,0,1,1A1.001,1.001,0,0,0,25,7Z"></path><path d="M4,21a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,4,21Zm0-4a1,1,0,1,0,1,1A1.001,1.001,0,0,0,4,17Z"></path><path d="M28,21a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,28,21Zm0-4a1,1,0,1,0,1,1A1.001,1.001,0,0,0,28,17Z"></path><path d="M16,22a6,6,0,1,1,6-6A6.0069,6.0069,0,0,1,16,22Zm0-10a4,4,0,1,0,4,4A4.0045,4.0045,0,0,0,16,12Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
