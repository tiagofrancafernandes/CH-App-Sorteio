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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>help-desk</title><path d="M27,10H21a3.0033,3.0033,0,0,0-3,3v6a2.0023,2.0023,0,0,0,2,2v7a2.0023,2.0023,0,0,0,2,2h4a2.0023,2.0023,0,0,0,2-2V21a2.0023,2.0023,0,0,0,2-2V13A3.0033,3.0033,0,0,0,27,10Zm1,9H26v9H22V19H20V13a1.0009,1.0009,0,0,1,1-1h6a1.0009,1.0009,0,0,1,1,1Z"></path><path d="M20,5a4,4,0,1,1,4,4A4.0042,4.0042,0,0,1,20,5Zm2,0a2,2,0,1,0,2-2A2.0023,2.0023,0,0,0,22,5Z"></path><path d="M14,16V13a3.0033,3.0033,0,0,0-3-3H5a3.0033,3.0033,0,0,0-3,3v3H0v2H16V16ZM4,13a1.0009,1.0009,0,0,1,1-1h6a1.0009,1.0009,0,0,1,1,1v3H4Z"></path><path d="M4,5A4,4,0,1,1,8,9,4.0042,4.0042,0,0,1,4,5ZM6,5A2,2,0,1,0,8,3,2.0023,2.0023,0,0,0,6,5Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
