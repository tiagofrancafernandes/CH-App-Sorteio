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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M18,23H16V21a3.0033,3.0033,0,0,0-3-3H9a3.0033,3.0033,0,0,0-3,3v2H4V21a5.0059,5.0059,0,0,1,5-5h4a5.0059,5.0059,0,0,1,5,5Z" transform="translate(0 0)"></path><path d="M11,6A3,3,0,1,1,8,9a3,3,0,0,1,3-3m0-2a5,5,0,1,0,5,5A5,5,0,0,0,11,4Z" transform="translate(0 0)"></path><rect x="2" y="26.0001" width="28" height="2"></rect><polygon points="30 8 28 8 28 6 26 6 26 4 30 4 30 8"></polygon><polygon points="19 4 23 4 23 6 21 6 21 8 19 8 19 4"></polygon><rect x="28" y="13.0001" width="2" height="2"></rect><rect x="26" y="11.0001" width="2" height="2"></rect><polygon points="19 11 21 11 21 13 23 13 23 15 19 15 19 11"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
