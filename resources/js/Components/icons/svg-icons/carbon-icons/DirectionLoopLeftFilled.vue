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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path id="inner-path" class="cls-1" d="M16,18h2v8H16ZM4,15l7,7,1.4141-1.4141L7.8281,16H21a5,5,0,1,0-5-5v1h2V11a3,3,0,1,1,3,3H7.8281l4.586-4.5859L11,8Z" transform="translate(0 0)" style="fill: none"></path><path d="M2,4V28a2,2,0,0,0,2,2H28a2,2,0,0,0,2-2V4a2,2,0,0,0-2-2H4A2,2,0,0,0,2,4ZM16,18h2v8H16ZM4,15l7-7,1.4141,1.4141L7.8281,14H21a3,3,0,1,0-3-3v1H16V11a5,5,0,1,1,5,5H7.8281l4.586,4.5859L11,22Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" transform="translate(32 32) rotate(-180)" style="fill: none"></rect></svg>

</template>
