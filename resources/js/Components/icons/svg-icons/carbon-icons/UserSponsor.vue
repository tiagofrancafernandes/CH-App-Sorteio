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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="31.8301 13.3662 30.8301 11.6338 28 13.2681 28 10 26 10 26 13.2676 23.1699 11.6338 22.1699 13.3662 25 15 22.1699 16.6338 23.1699 18.3662 26 16.7324 26 20 28 20 28 16.7319 30.8301 18.3662 31.8301 16.6338 29 15 31.8301 13.3662"></polygon><path d="m22,30h-2v-5c-.0033-2.7601-2.2399-4.9967-5-5h-6c-2.7601.0033-4.9967,2.2399-5,5v5h-2v-5c.0045-3.8641,3.1359-6.9955,7-7h6c3.8641.0045,6.9955,3.1359,7,7v5Z"></path><path d="m12,4c2.7614,0,5,2.2386,5,5s-2.2386,5-5,5-5-2.2386-5-5c.0031-2.7601,2.2399-4.9969,5-5m0-2c-3.866,0-7,3.134-7,7s3.134,7,7,7,7-3.134,7-7-3.134-7-7-7Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
