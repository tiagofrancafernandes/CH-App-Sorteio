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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="17" y="19" width="4" height="4"></rect><rect x="11" y="19" width="4" height="4"></rect><rect x="17" y="25" width="4" height="4"></rect><rect x="11" y="25" width="4" height="4"></rect><path d="M24.5,25H24V23h.5a5.4961,5.4961,0,0,0,.377-10.9795l-.8365-.0566-.09-.834a7.9979,7.9979,0,0,0-15.9014,0l-.09.834-.8365.0566A5.4961,5.4961,0,0,0,7.5,23H8v2H7.5A7.4964,7.4964,0,0,1,6.1782,10.124a9.9992,9.9992,0,0,1,19.6436,0A7.4964,7.4964,0,0,1,24.5,25Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
