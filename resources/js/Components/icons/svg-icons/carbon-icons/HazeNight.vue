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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>haze--night</title><path d="M29,22H13a1,1,0,0,0,0,2h9.6772a11.0991,11.0991,0,0,1-7.5561,2.9976c-.1384,0-.2783.0048-.4177,0a11.0945,11.0945,0,0,1-3.201-21.584,15.1528,15.1528,0,0,0-.0488,6.5869h2.0457a13.15,13.15,0,0,1,.39-7.6206A1.015,1.015,0,0,0,12.98,3a.9825.9825,0,0,0-.1746.0156A13.0958,13.0958,0,0,0,14.63,28.9971c.164.0063.3281,0,.4907,0A13.04,13.04,0,0,0,25.3779,24H29a1,1,0,0,0,0-2Z"></path><path d="M27,20H17a1,1,0,0,1,0-2H27a1,1,0,0,1,0,2Z"></path><path d="M25,16H13a1,1,0,0,1,0-2H25a1,1,0,0,1,0,2Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
