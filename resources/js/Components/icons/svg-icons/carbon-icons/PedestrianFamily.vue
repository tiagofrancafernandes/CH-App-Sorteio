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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M20,30H17a2.0021,2.0021,0,0,1-2-2V23h2v5h3V23h2V19a1.0011,1.0011,0,0,0-1-1H12.2793l-2-6H4a1.0011,1.0011,0,0,0-1,1v6H5v9H9V21h2v7a2.0021,2.0021,0,0,1-2,2H5a2.0021,2.0021,0,0,1-2-2V21a2.0021,2.0021,0,0,1-2-2V13a3.0033,3.0033,0,0,1,3-3h6.2793a1.998,1.998,0,0,1,1.8975,1.3674L13.7207,16H21a3.0033,3.0033,0,0,1,3,3v4a2.0021,2.0021,0,0,1-2,2v3A2.0021,2.0021,0,0,1,20,30Z"></path><path d="M28,30H26V19h3V13a1.0011,1.0011,0,0,0-1-1H24V10h4a3.0033,3.0033,0,0,1,3,3v6a2.0021,2.0021,0,0,1-2,2H28Z"></path><path d="M7,9a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,7,9ZM7,3A2,2,0,1,0,9,5,2.0021,2.0021,0,0,0,7,3Z"></path><path d="M25,9a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,25,9Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,25,3Z"></path><path d="M18.5,15A3.5,3.5,0,1,1,22,11.5,3.5041,3.5041,0,0,1,18.5,15Zm0-5A1.5,1.5,0,1,0,20,11.5,1.5017,1.5017,0,0,0,18.5,10Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
