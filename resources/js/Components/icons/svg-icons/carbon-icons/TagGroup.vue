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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>tag--group</title><circle cx="10" cy="14" r="2"></circle><path d="M16,30a1,1,0,0,1-.71-.29L4.59,19A2,2,0,0,1,4,17.59V10A2,2,0,0,1,6,8h7.59A2,2,0,0,1,15,8.59l10.71,10.7a1,1,0,0,1,0,1.42l-9,9A1,1,0,0,1,16,30ZM6,10v7.59l10,10L23.59,20l-10-10Z"></path><path d="M27.71,13.29,17,2.59A2,2,0,0,0,15.59,2H8A2,2,0,0,0,6,4V6H8V4h7.59l10,10-1.3,1.29,1.42,1.42,2-2A1,1,0,0,0,27.71,13.29Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
