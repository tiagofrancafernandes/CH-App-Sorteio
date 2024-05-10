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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>distribute--vertical-center</title><path d="M30,21H26V20a2.0023,2.0023,0,0,0-2-2H8a2.0023,2.0023,0,0,0-2,2v1H2v2H6v1a2.0023,2.0023,0,0,0,2,2H24a2.0023,2.0023,0,0,0,2-2V23h4Zm-6,3H8V20l16-.001Z"></path><path d="M30,9H22V8a2.0023,2.0023,0,0,0-2-2H12a2.0023,2.0023,0,0,0-2,2V9H2v2h8v1a2.0023,2.0023,0,0,0,2,2h8a2.0023,2.0023,0,0,0,2-2V11h8ZM20,12H12V8l8-.001Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
