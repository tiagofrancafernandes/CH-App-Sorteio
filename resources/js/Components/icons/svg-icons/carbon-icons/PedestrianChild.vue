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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>pedestrian-child</title><path d="M26,16H17.4683l-5-6H5a3.0033,3.0033,0,0,0-3,3v6a2.0023,2.0023,0,0,0,2,2v7a2.0023,2.0023,0,0,0,2,2h4a2.0023,2.0023,0,0,0,2-2V21H10v7H6V19H4V13a1.0009,1.0009,0,0,1,1-1h6.5317l5,6H26a1.0009,1.0009,0,0,1,1,1v3H25v6H22V22H20v6a2.0023,2.0023,0,0,0,2,2h3a2.0023,2.0023,0,0,0,2-2V24a2.0023,2.0023,0,0,0,2-2V19A3.0033,3.0033,0,0,0,26,16Z"></path><path d="M23.5,15A3.5,3.5,0,1,1,27,11.5,3.5042,3.5042,0,0,1,23.5,15Zm0-5A1.5,1.5,0,1,0,25,11.5,1.5017,1.5017,0,0,0,23.5,10Z"></path><path d="M8,9a4,4,0,1,1,4-4A4.0042,4.0042,0,0,1,8,9ZM8,3a2,2,0,1,0,2,2A2.0023,2.0023,0,0,0,8,3Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
