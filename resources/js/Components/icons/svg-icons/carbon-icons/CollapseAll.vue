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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>collapse-all</title><path d="M30,15H28V7H13V5H28a2.0023,2.0023,0,0,1,2,2Z"></path><path d="M25,20H23V12H8V10H23a2.0023,2.0023,0,0,1,2,2Z"></path><path d="M18,27H4a2.0023,2.0023,0,0,1-2-2V17a2.0023,2.0023,0,0,1,2-2H18a2.0023,2.0023,0,0,1,2,2v8A2.0023,2.0023,0,0,1,18,27ZM4,17v8H18.0012L18,17Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
