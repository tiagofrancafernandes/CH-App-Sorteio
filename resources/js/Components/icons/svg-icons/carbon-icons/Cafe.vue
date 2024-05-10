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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>coffee</title><rect x="2" y="28" width="28" height="2"></rect><path d="M24.5,11H8a2.002,2.002,0,0,0-2,2v8a5.0059,5.0059,0,0,0,5,5h8a5.0059,5.0059,0,0,0,5-5V20h.5a4.5,4.5,0,0,0,0-9ZM22,21a3.0033,3.0033,0,0,1-3,3H11a3.0033,3.0033,0,0,1-3-3V13H22Zm2.5-3H24V13h.5a2.5,2.5,0,0,1,0,5Z" transform="translate(0 0)"></path><path d="M19,9H17V8.854a1.9883,1.9883,0,0,0-1.1055-1.7886L13.2109,5.7236A3.9788,3.9788,0,0,1,11,2.146V1h2V2.146a1.9892,1.9892,0,0,0,1.1055,1.7886l2.6836,1.3418A3.9792,3.9792,0,0,1,19,8.854Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
