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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M30,11V5H24V7H14V4a2.0025,2.0025,0,0,0-2-2H4A2.0025,2.0025,0,0,0,2,4v8a2.0025,2.0025,0,0,0,2,2h8a2.0025,2.0025,0,0,0,2-2V9a3.0033,3.0033,0,0,1,3,3v9H11V19H5v6h6V23h6v2a2.0025,2.0025,0,0,0,2,2h5v2h6V23H24v2H19V18h5v2h6V14H24v2H19V12a4.9521,4.9521,0,0,0-1.0254-3H24v2ZM4,12V4h8v8ZM9,23H7V21H9Zm17,2h2v2H26Zm0-9h2v2H26Zm0-9h2V9H26Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
