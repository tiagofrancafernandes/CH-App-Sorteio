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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M20,13a5,5,0,0,0,10,0,1,1,0,0,0-.1055-.4473l-4-8a1,1,0,0,0-1.2109-.5014l-6.3308,2.11A3.0322,3.0322,0,0,0,17,5.1841V2H15V5.1841a2.9949,2.9949,0,0,0-1.9956,2.76l-6.3208,2.107a1,1,0,0,0-.5781.5014l-4,8A1,1,0,0,0,2,19a5,5,0,0,0,10,0,1,1,0,0,0-.1055-.4473L8.41,11.584l5.237-1.7456A3.0285,3.0285,0,0,0,15,10.8154V28H6v2H26V28H17V10.8159a2.9951,2.9951,0,0,0,1.9956-2.76l4.03-1.3438-2.92,5.8408A1,1,0,0,0,20,13ZM7,22a2.9956,2.9956,0,0,1-2.8152-2h5.63A2.9956,2.9956,0,0,1,7,22Zm2.3821-4H4.6179L7,13.2363ZM16,9a1,1,0,1,1,1-1A1.0009,1.0009,0,0,1,16,9Zm9,7a2.9958,2.9958,0,0,1-2.8152-2h5.63A2.9956,2.9956,0,0,1,25,16Zm0-8.7637L27.3821,12H22.6179Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
