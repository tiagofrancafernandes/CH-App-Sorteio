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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28.2261,22.812a13.9664,13.9664,0,0,0,0-13.624L28.4141,9a2.0021,2.0021,0,0,0,0-2.8281l-2.5857-2.586a2.0028,2.0028,0,0,0-2.8284,0l-.1877.1875a13.9687,13.9687,0,0,0-13.6243,0L9,3.5859a2.0024,2.0024,0,0,0-2.8284,0L3.5859,6.1719A2.0021,2.0021,0,0,0,3.5859,9l.1878.1875a13.97,13.97,0,0,0,0,13.625L3.5859,23a2.0021,2.0021,0,0,0,0,2.8281l2.5857,2.586a2.0021,2.0021,0,0,0,2.8284,0l.188-.188a13.9687,13.9687,0,0,0,13.6243.0005L23,28.4141a2.0021,2.0021,0,0,0,2.8284,0l2.5857-2.586a2.0021,2.0021,0,0,0,0-2.8281ZM28,16a11.973,11.973,0,0,1-1.2546,5.3315l-3.8948-3.895a6.9808,6.9808,0,0,0,0-2.873l3.8948-3.895A11.973,11.973,0,0,1,28,16ZM27,7.5859l-4.9346,4.9346A7.0434,7.0434,0,0,0,19.48,9.9346L24.4143,5ZM16,21a5,5,0,1,1,5-5A5.0057,5.0057,0,0,1,16,21ZM21.3154,5.2705,17.4365,9.1494a6.9808,6.9808,0,0,0-2.873,0L10.6846,5.2705A12.2484,12.2484,0,0,1,21.3154,5.2705ZM7.5859,5l4.9346,4.9346a7.0449,7.0449,0,0,0-2.5859,2.5859L5,7.5859ZM4,16a11.9716,11.9716,0,0,1,1.2546-5.3311l3.8948,3.8946a6.9808,6.9808,0,0,0,0,2.873L5.2546,21.3311A11.9716,11.9716,0,0,1,4,16ZM7.5857,27,5,24.4141,9.9346,19.48a7.0434,7.0434,0,0,0,2.5859,2.5859Zm3.0989-.27,3.8789-3.8789a6.9808,6.9808,0,0,0,2.873,0L21.3154,26.73A12.2484,12.2484,0,0,1,10.6846,26.73Zm13.73.27L19.48,22.0654A7.0449,7.0449,0,0,0,22.0654,19.48L27,24.4141Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
