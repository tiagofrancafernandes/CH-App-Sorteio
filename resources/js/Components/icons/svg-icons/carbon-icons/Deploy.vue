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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M23,2,17,8l1.4146,1.4023L22,5.8184V28H6V12H4V28a2.0025,2.0025,0,0,0,2,2H22a2.0025,2.0025,0,0,0,2-2V5.8154l3.5859,3.5869L29,8Z"></path><path d="M16,24H12a2.0023,2.0023,0,0,1-2-2V18a2.0023,2.0023,0,0,1,2-2h4a2.0023,2.0023,0,0,1,2,2v4A2.0023,2.0023,0,0,1,16,24Zm-4-6v4h4V18Z"></path><rect id="_Transparent_Rectangle" data-name=" Transparent Rectangle" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
