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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>application</title><path d="M16,18H6a2,2,0,0,1-2-2V6A2,2,0,0,1,6,4H16a2,2,0,0,1,2,2V16A2,2,0,0,1,16,18ZM6,6V16H16V6Z" transform="translate(0 0)"></path><path d="M26,12v4H22V12h4m0-2H22a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2h4a2,2,0,0,0,2-2V12a2,2,0,0,0-2-2Z" transform="translate(0 0)"></path><path d="M26,22v4H22V22h4m0-2H22a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2h4a2,2,0,0,0,2-2V22a2,2,0,0,0-2-2Z" transform="translate(0 0)"></path><path d="M16,22v4H12V22h4m0-2H12a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2h4a2,2,0,0,0,2-2V22a2,2,0,0,0-2-2Z" transform="translate(0 0)"></path><g id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;"><rect class="cls-1" width="32" height="32" style="fill:none"></rect></g></svg>

</template>
