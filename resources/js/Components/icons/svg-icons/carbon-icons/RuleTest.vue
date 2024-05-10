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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M23,30a7,7,0,1,1,7-7A7.0078,7.0078,0,0,1,23,30Zm0-12a5,5,0,1,0,5,5A5.0055,5.0055,0,0,0,23,18Z" transform="translate(0 0)"></path><polygon points="26 24.586 24 22.586 24 20 22 20 22 23.414 24.586 26 26 24.586"></polygon><rect x="8" y="16" width="6" height="2"></rect><rect x="8" y="10" width="12" height="2"></rect><path d="M26,4a2.0023,2.0023,0,0,0-2-2H4A2.0023,2.0023,0,0,0,2,4V17a10.9814,10.9814,0,0,0,5.8242,9.707L13,29.4668V27.2L8.7656,24.9424A8.9858,8.9858,0,0,1,4,17V4H24v9h2Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
