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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon id="_inner-path_" data-name="&lt;inner-path&gt;" class="cls-1" points="25.496 10.088 22.874 7.466 22.874 3 25.124 3 25.124 6.534 27.088 8.498 25.496 10.088" style="fill: none"></polygon><path d="M24,1a6,6,0,1,0,6,6A6.0066,6.0066,0,0,0,24,1Zm1.4971,9.0884L22.875,7.4658V3h2.25V6.5342l1.9639,1.9634Z" transform="translate(0 0)"></path><path d="M6,16V10h9V8H6.1843A2.9948,2.9948,0,0,1,9,6h6V4H9A5.0057,5.0057,0,0,0,4,9V21a4.99,4.99,0,0,0,3.582,4.77L5.7693,30H7.9451l1.7143-4h8.6812l1.7143,4h2.1758L20.418,25.77A4.99,4.99,0,0,0,24,21V16Zm16,4H19v2h2.8157A2.9948,2.9948,0,0,1,19,24H9a2.9948,2.9948,0,0,1-2.8157-2H9V20H6V18H22Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
