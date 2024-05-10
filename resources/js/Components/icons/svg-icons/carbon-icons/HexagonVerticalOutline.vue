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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m3,23v-14c0-.3555.189-.6846.4961-.8638L15.4961,1.1362c.3113-.1816.6965-.1816,1.0078,0l12,7c.3071.1792.4961.5083.4961.8638v14c0,.3555-.189.6846-.4961.8638l-12,7c-.3113.1816-.6965.1816-1.0078,0l-12-7c-.3071-.1792-.4961-.5083-.4961-.8638Zm2-13.4258v12.8516l11,6.4165,11-6.4165v-12.8516l-11-6.4165-11,6.4165Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" transform="translate(32 32) rotate(180)" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
