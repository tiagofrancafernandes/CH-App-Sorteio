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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>hotel</title><path d="M9.5,15A1.5,1.5,0,1,1,8,16.5,1.5,1.5,0,0,1,9.5,15m0-2A3.5,3.5,0,1,0,13,16.5,3.5,3.5,0,0,0,9.5,13Z"></path><path d="M25,14H17a2,2,0,0,0-2,2v6H4V10.6L16,4.14l12.53,6.74.94-1.76-13-7a1,1,0,0,0-.94,0l-13,7A1,1,0,0,0,2,10V30H4V24H28v6h2V19A5,5,0,0,0,25,14Zm-8,8V16h8a3,3,0,0,1,3,3v3Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
