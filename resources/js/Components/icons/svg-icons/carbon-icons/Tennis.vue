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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>tennis</title><rect x="20" y="2" width="4" height="4" rx="2"></rect><path d="M11,16a1,1,0,0,1-.707-1.707l7-7a1,1,0,1,1,1.414,1.414l-7,7A.9962.9962,0,0,1,11,16Z"></path><path d="M23.707,24.293a8.3948,8.3948,0,0,0-4.72-2.209c.1992-.1641.3931-.3364.5777-.521a9.2447,9.2447,0,0,0,1.7334-9.9141l-1.8768.6973c1.11,2.9805.6346,5.8975-1.2722,7.8022a6.6964,6.6964,0,0,1-5.561,1.8047,9.7746,9.7746,0,0,1-5.771-2.7856c-2.9727-2.97-4.0759-8.2276-.9805-11.32,1.9068-1.9053,4.8267-2.38,7.8094-1.271l.6987-1.875C10.6616,3.333,6.8591,3.9961,4.4207,6.4331c-3.9427,3.9385-2.6761,10.4956.98,14.1489a11.8136,11.8136,0,0,0,6.9766,3.36c.21.022.4153.0234.6223.0332V24h4.9968a6.8463,6.8463,0,0,1,4.2962,1.707L26.5859,30,28,28.5859Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
