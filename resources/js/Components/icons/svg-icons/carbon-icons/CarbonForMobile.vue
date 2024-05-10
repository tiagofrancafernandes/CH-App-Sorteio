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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m32,14h-2v-5.9258l-5.5039-3.2104,1.0078-1.7275,6,3.5c.3071.1792.4961.5083.4961.8638v6.5Z"></path><path d="m20,22c-.1743,0-.3481-.0454-.5039-.1362l-6-3.5c-.3071-.1792-.4961-.5083-.4961-.8638v-7c0-.3555.189-.6846.4961-.8638l6-3.5c.3115-.1816.6963-.1816,1.0078,0l6,3.5c.3071.1792.4961.5083.4961.8638v7c0,.3555-.189.6846-.4961.8638l-6,3.5c-.1558.0908-.3296.1362-.5039.1362Zm-5-5.0742l5,2.9165,5-2.9165v-5.8516l-5-2.9165-5,2.9165v5.8516Z"></path><circle cx="12.5" cy="24.5" r="1.5"></circle><path d="m19,30H6c-1.1028,0-2-.8972-2-2V4c0-1.1028.8972-2,2-2h13v2H6v24h13v-4h2v4c0,1.1028-.8972,2-2,2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
