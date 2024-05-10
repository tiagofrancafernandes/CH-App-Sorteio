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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>data-share</title><path d="M5,25V15.8281l-3.5859,3.586L0,18l6-6,6,6-1.4141,1.4141L7,15.8281V25H19v2H7A2.0024,2.0024,0,0,1,5,25Z" transform="translate(0 0)"></path><path d="M24,22h4a2.002,2.002,0,0,1,2,2v4a2.002,2.002,0,0,1-2,2H24a2.002,2.002,0,0,1-2-2V24A2.002,2.002,0,0,1,24,22Zm4,6V24H23.9985L24,28Z" transform="translate(0 0)"></path><path d="M27,6v9.1719l3.5859-3.586L32,13l-6,6-6-6,1.4141-1.4141L25,15.1719V6H13V4H25A2.0024,2.0024,0,0,1,27,6Z" transform="translate(0 0)"></path><rect x="2" y="6" width="6" height="2"></rect><rect x="2" y="2" width="8" height="2"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
