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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M21,16H11a2.0023,2.0023,0,0,0-2,2v6a2.0023,2.0023,0,0,0,2,2h4v2H12v2h8V28H17V26h4a2.0023,2.0023,0,0,0,2-2V18A2.0023,2.0023,0,0,0,21,16ZM11,24V18H21l.0015,6Z" transform="translate(0 0)"></path><path d="M25.8218,10.124a9.9992,9.9992,0,0,0-19.6436,0A7.4914,7.4914,0,0,0,7,24.9746v-2a5.4945,5.4945,0,0,1,.123-10.9541l.8365-.0566.09-.834a7.9979,7.9979,0,0,1,15.9014,0l.09.834.8365.0566A5.4945,5.4945,0,0,1,25,22.9746v2a7.4914,7.4914,0,0,0,.8218-14.8506Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
