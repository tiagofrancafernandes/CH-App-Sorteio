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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M30,13V11H18.6182l-.7237-1.4473A1,1,0,0,0,17,9H9a1,1,0,0,0-1,1v5H4v2H22.6379l3.6,3H3a1,1,0,0,0-1,1v2a5.0057,5.0057,0,0,0,5,5H25a5.0057,5.0057,0,0,0,5-5V21a1.0011,1.0011,0,0,0-.36-.7686l-6-5A1.0015,1.0015,0,0,0,23,15H20.6182l-1-2ZM28,23a3.0033,3.0033,0,0,1-3,3H7a3.0033,3.0033,0,0,1-3-3V22H28ZM10,15V11h6.3821l2,4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
