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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m29,8c0-.5522-.4478-1-1-1h-4c-.5522,0-1,.4478-1,1v7h-2V3c0-.5522-.4478-1-1-1h-4c-.5522,0-1,.4478-1,1v12h-2V5c0-.5522-.4478-1-1-1h-4c-.5522,0-1,.4478-1,1v10H3v12c0,.5522.4478,1,1,1h4c.5522,0,1-.4478,1-1v-10h2v5c0,.5522.4478,1,1,1h4c.5522,0,1-.4478,1-1v-5h2v12c0,.5522.4478,1,1,1h4c.5522,0,1-.4478,1-1v-12h4v-9ZM7,26h-2v-9h2v9Zm8-5h-2v-4h2v4Zm2-6V4h2v11h-2Zm10,0h-2v-6h2v6Z" style="fill:currentColor"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
