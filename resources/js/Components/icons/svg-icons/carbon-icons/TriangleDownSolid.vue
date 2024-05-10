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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m29.0194,3c.5692,0,.979.4772.9806,1,.0005.1628-.0388.3299-.1249.4885l-13.0196,23.9867c-.1865.3435-.521.5248-.8555.5248s-.6694-.1812-.8559-.5248L2.1246,4.4885c-.0861-.1586-.1251-.3257-.1246-.4885.0016-.5228.4111-1,.9803-1h26.0391Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" transform="translate(32 32) rotate(180)" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
