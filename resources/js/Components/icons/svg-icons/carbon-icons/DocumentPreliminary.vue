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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M24,30a6,6,0,1,1,6-6A6.0067,6.0067,0,0,1,24,30Zm0-10a4,4,0,1,0,4,4A4.0045,4.0045,0,0,0,24,20Z"></path><rect x="8" y="22" width="8" height="2"></rect><rect x="8" y="16" width="10" height="2"></rect><path d="M16,28H6V4h8v6a2.0058,2.0058,0,0,0,2,2h6v3h2V10a.9092.9092,0,0,0-.3-.7l-7-7A.9087.9087,0,0,0,16,2H6A2.0058,2.0058,0,0,0,4,4V28a2.0058,2.0058,0,0,0,2,2H16ZM16,4.4,21.6,10H16Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
