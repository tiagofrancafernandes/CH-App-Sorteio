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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-1" d="M20,24H11.8625a4.13,4.13,0,0,0-.4284-1.02L21.98,12.4343A3.9943,3.9943,0,1,0,20.1414,8H14v2h6.1414a3.96,3.96,0,0,0,.4243,1.02L10.02,21.5656A3.9943,3.9943,0,1,0,11.8587,26H20v3h8V21H20ZM24,7a2,2,0,1,1-2,2A2.0023,2.0023,0,0,1,24,7ZM8,27a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,8,27Zm14-4h4v4H22Z" style="fill:currentColor"></path><path d="M9.6929,12.7505a5,5,0,0,1-.0005-7.5L11.0166,6.75a3,3,0,0,0-.0005,4.501Z"></path><path d="M7.0474,15.751a9,9,0,0,1,0-13.501l1.3232,1.5a7,7,0,0,0,0,10.501Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill: none"></rect></svg>

</template>
