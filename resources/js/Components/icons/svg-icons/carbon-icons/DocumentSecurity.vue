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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M23,30l-2.1387-1.0127A5.0216,5.0216,0,0,1,18,24.4678V18H28v6.4678a5.0216,5.0216,0,0,1-2.8613,4.52ZM20,20v4.4678a3.012,3.012,0,0,0,1.7168,2.7109L23,27.7861l1.2832-.6074A3.012,3.012,0,0,0,26,24.4678V20Z" transform="translate(0 0)"></path><path d="M16,28H6V4h8v6a2.0058,2.0058,0,0,0,2,2h6v3h2V10a.9092.9092,0,0,0-.3-.7l-7-7A.9087.9087,0,0,0,16,2H6A2.0058,2.0058,0,0,0,4,4V28a2.0058,2.0058,0,0,0,2,2H16ZM16,4.4,21.6,10H16Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
