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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>bar</title><path d="M25,11H15a1,1,0,0,0-1,1v4a6.0046,6.0046,0,0,0,5,5.91V28H16v2h8V28H21V21.91A6.0046,6.0046,0,0,0,26,16V12A1,1,0,0,0,25,11Zm-1,5a4,4,0,0,1-8,0V13h8Z" transform="translate(0 0)"></path><path d="M15,1H10A1,1,0,0,0,9,2V9.3706A6.09,6.09,0,0,0,6,15V29a1,1,0,0,0,1,1h5V28H8V15c0-3.1875,2.231-4.02,2.3164-4.0513L11,10.7207V3h3V8h2V2A1,1,0,0,0,15,1Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
