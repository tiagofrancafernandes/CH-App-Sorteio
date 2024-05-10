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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,26V22a2.0023,2.0023,0,0,0-2-2H22a2.0023,2.0023,0,0,0-2,2v6a2.0077,2.0077,0,0,0,2,2h5V28H22V26Zm-6-4h4v2H22Z"></path><path d="M25.707,9.293l-7-7A1,1,0,0,0,18,2H8A2.002,2.002,0,0,0,6,4V28a2.0023,2.0023,0,0,0,2,2h8V28H8V4h8v6a2.002,2.002,0,0,0,2,2h6v4h2V10A1,1,0,0,0,25.707,9.293ZM18,4.4141,23.5859,10H18Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
