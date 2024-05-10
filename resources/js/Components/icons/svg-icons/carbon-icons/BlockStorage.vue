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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M9,12V10H4a2,2,0,0,0-2,2V28a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V19H20v9H4V12" transform="translate(0 0)"></path><path d="M22,12H14V4h8ZM12,4v8a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V4a2,2,0,0,0-2-2H14A2,2,0,0,0,12,4Z" transform="translate(0 0)"></path><path d="M14,18v4H10V18h4M8,18v4a2,2,0,0,0,2,2h4a2,2,0,0,0,2-2V18a2,2,0,0,0-2-2H10A2,2,0,0,0,8,18Z" transform="translate(0 0)"></path><path d="M28,17v2H26V17h2m-4-1v4a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V16a1,1,0,0,0-1-1H25A1,1,0,0,0,24,16Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
