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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M22,24H10a2,2,0,0,1-2-2V19h2v3H22V19h2v3A2,2,0,0,1,22,24Z" transform="translate(0 -0.0001)"></path><rect x="2" y="14.9999" width="28" height="2"></rect><path d="M24,13H22V10H10v3H8V10a2,2,0,0,1,2-2H22a2,2,0,0,1,2,2Z" transform="translate(0 -0.0001)"></path><polygon points="30 10 28 10 28 4 22 4 22 2 30 2 30 10"></polygon><polygon points="4 10 2 10 2 2 10 2 10 4 4 4 4 10"></polygon><polygon points="10 30 2 30 2 22 4 22 4 28 10 28 10 30"></polygon><polygon points="30 30 22 30 22 28 28 28 28 22 30 22 30 30"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
