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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>worship--jewish</title><path d="M24.291,16l3.585-6.5181A1,1,0,0,0,27,8H19.8911L16.876,2.5181a1,1,0,0,0-1.752,0L12.1089,8H5a1,1,0,0,0-.876,1.4819L7.709,16,4.124,22.5181A1,1,0,0,0,5,24h7.1089l3.0151,5.4819a1,1,0,0,0,1.752,0L19.8911,24H27a1,1,0,0,0,.876-1.4819Zm-5.5823,6L16,26.9248,13.2913,22h-6.6l3.3-6-3.3-6h6.6L16,5.0752,18.7087,10h6.6l-3.3,6,3.3,6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
