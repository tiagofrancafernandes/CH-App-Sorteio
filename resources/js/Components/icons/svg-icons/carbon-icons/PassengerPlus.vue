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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M10.5,9A3.5,3.5,0,1,1,14,5.5,3.5042,3.5042,0,0,1,10.5,9Zm0-5A1.5,1.5,0,1,0,12,5.5,1.5017,1.5017,0,0,0,10.5,4Z" transform="translate(0 0)"></path><path d="M22.4739,31.313,19.34,24H12.2385a4.0072,4.0072,0,0,1-3.8662-2.9707l-1.6338-6.126a3.8988,3.8988,0,0,1,7.5342-2.0092L15.1008,16H21v2H13.5637l-1.2226-4.5908a1.9,1.9,0,0,0-3.6709.979l1.6338,6.1255A2.0051,2.0051,0,0,0,12.2385,22h8.42l3.6543,8.5254Z" transform="translate(0 0)"></path><polygon points="30 6 26 6 26 2 24 2 24 6 20 6 20 8 24 8 24 12 26 12 26 8 30 8 30 6"></polygon><path d="M18,28H7.7676A2.0025,2.0025,0,0,1,5.835,26.5151L2.033,12.2576l1.9326-.5152L7.7676,26H18Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
