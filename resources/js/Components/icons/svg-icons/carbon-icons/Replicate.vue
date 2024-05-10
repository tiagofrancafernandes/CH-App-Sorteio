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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,8h2V4a2.0021,2.0021,0,0,0-2-2H24V4h4Z" transform="translate(0 0)"></path><rect x="17" y="2" width="4" height="2"></rect><rect x="28" y="11" width="2" height="4"></rect><path d="M28,18v4H24V10a2.0023,2.0023,0,0,0-2-2H10V4h4V2H10A2.0023,2.0023,0,0,0,8,4V8H4a2.0023,2.0023,0,0,0-2,2V28a2.0023,2.0023,0,0,0,2,2H22a2.0023,2.0023,0,0,0,2-2V24h4a2.0023,2.0023,0,0,0,2-2V18ZM22,28H4V10H22Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
