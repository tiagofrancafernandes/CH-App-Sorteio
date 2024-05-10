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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="9" y="21" width="14" height="2"></rect><path d="M11,14a2,2,0,1,0,2,2A1.9806,1.9806,0,0,0,11,14Z"></path><path d="M21,14a2,2,0,1,0,2,2A1.9806,1.9806,0,0,0,21,14Z"></path><path d="M28,8H18.4141l2.0722-2.0723A2.04,2.04,0,0,0,21,6a2,2,0,1,0-2-2,2.0412,2.0412,0,0,0,.0723.5137L15.5859,8H4a2.0025,2.0025,0,0,0-2,2V26a2.0025,2.0025,0,0,0,2,2H28a2.0025,2.0025,0,0,0,2-2V10A2.0025,2.0025,0,0,0,28,8ZM4,26V10H28V26Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
