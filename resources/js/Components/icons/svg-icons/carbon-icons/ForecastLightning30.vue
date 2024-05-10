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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M14,28A10,10,0,0,1,14,8h4v5l6-6L18,1V6H14a12,12,0,0,0,0,24Z" transform="translate(0 0)"></path><polygon points="11.67 24 9.934 23 12.221 19 8.332 19 12.325 12 14.062 13 11.778 17 15.668 17 11.67 24"></polygon><path d="M20,20H16v2h4v2H17v2h3v2H16v2h4a2.0027,2.0027,0,0,0,2-2V22A2.0023,2.0023,0,0,0,20,20Z" transform="translate(0 0)"></path><path d="M28,30H26a2.0021,2.0021,0,0,1-2-2V22a2.0021,2.0021,0,0,1,2-2h2a2.0021,2.0021,0,0,1,2,2v6A2.0021,2.0021,0,0,1,28,30Zm-2-8v6h2V22Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
