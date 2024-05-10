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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m23,29h-14c-.3555,0-.6846-.189-.8638-.4961L1.1362,16.5039c-.1816-.3113-.1816-.6965,0-1.0078L8.1362,3.4961c.1792-.3071.5083-.4961.8638-.4961h14c.3555,0,.6846.189.8638.4961l7,12c.1816.3113.1816.6965,0,1.0078l-7,12c-.1792.3071-.5083.4961-.8638.4961Zm-13.4258-2h12.8516l6.4165-11-6.4165-11h-12.8516l-6.4165,11,6.4165,11Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" transform="translate(32) rotate(90)" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
