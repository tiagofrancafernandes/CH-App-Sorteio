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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>app-connectivity</title><path d="M20,14h8a2.0023,2.0023,0,0,0,2-2V4a2.0023,2.0023,0,0,0-2-2H20a2.0023,2.0023,0,0,0-2,2H9A2.0023,2.0023,0,0,0,7,6v4H4a2.0023,2.0023,0,0,0-2,2v8a2.0023,2.0023,0,0,0,2,2H6v4a2.0023,2.0023,0,0,0,2,2H18a2.0023,2.0023,0,0,0,2,2h8a2.0023,2.0023,0,0,0,2-2V20a2.0023,2.0023,0,0,0-2-2H20a2.0023,2.0023,0,0,0-2,2v6H8V22h4a2.0023,2.0023,0,0,0,2-2V12a2.0023,2.0023,0,0,0-2-2H9V6h9v6A2.0023,2.0023,0,0,0,20,14Zm0,14V24h8v4Zm8-8,0,2H20V20ZM4,20V16h8v4Zm8.0005-6H4V12h8ZM20,12V8h8v4Zm8-8,0,2H20V4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
