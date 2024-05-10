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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M19.6262,29.5256,19.11,27.5935A12.0035,12.0035,0,0,0,25.2312,8.3323l1.5376-1.2788a14.0033,14.0033,0,0,1-7.1426,22.4721Z"></path><path d="M10,29H8V25.18l.8037-.1607C10.2617,24.728,12,23.6206,12,20V18.6182l-4-2V14.3818l4-2V12c0-5.4673,3.9253-9,10-9h2V6.82l-.8037.1607C21.7383,7.272,20,8.3794,20,12v.3818l4,2v2.2364l-4,2V20C20,25.4673,16.0747,29,10,29Zm0-2c4.9346,0,8-2.6821,8-7V17.3818L21.7642,15.5,18,13.6182V12c0-4.5781,2.3853-6.1924,4-6.76V5c-4.9346,0-8,2.6821-8,7v1.6182L10.2358,15.5,14,17.3818V20c0,4.5781-2.3853,6.1924-4,6.76Z"></path><path d="M5.2312,24.9465A14.0032,14.0032,0,0,1,12.3779,2.4734l.5161,1.9321A12.0035,12.0035,0,0,0,6.7688,23.6677Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
