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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m28,28H4c-1.1028,0-2-.8972-2-2v-6h2v6h24v-6h2v6c0,1.1028-.8972,2-2,2Z"></path><path d="m17,17v4c0,.5522.4477,1,1,1h4c.5523,0,1-.4478,1-1v-4c0-.5523-.4477-1-1-1h-4c-.5523,0-1,.4477-1,1Zm2,1h2v2h-2v-2Z"></path><path d="m9,17v4c0,.5522.4477,1,1,1h4c.5523,0,1-.4478,1-1v-4c0-.5523-.4477-1-1-1h-4c-.5523,0-1,.4477-1,1Zm2,1h2v2h-2v-2Z"></path><path d="m17,9v4c0,.5522.4477,1,1,1h4c.5523,0,1-.4478,1-1v-4c0-.5523-.4477-1-1-1h-4c-.5523,0-1,.4477-1,1Zm2,1h2v2h-2v-2Z"></path><path d="m5,5v8c0,.5522.4477,1,1,1h8c.5523,0,1-.4478,1-1V5c0-.5523-.4477-1-1-1H6c-.5523,0-1,.4477-1,1Zm2,1h6v6h-6v-6Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
