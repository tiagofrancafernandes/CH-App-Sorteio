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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,30H18a2.0021,2.0021,0,0,1-2-2V18a2.0021,2.0021,0,0,1,2-2h2v2H18V28H28V18H26V16h2a2.0021,2.0021,0,0,1,2,2V28A2.0021,2.0021,0,0,1,28,30Z" transform="translate(0 0)"></path><path d="M14,16H4a2.0021,2.0021,0,0,1-2-2V4A2.0021,2.0021,0,0,1,4,2H14a2.0021,2.0021,0,0,1,2,2V6H14V4H4V14H14V12h2v2A2.0021,2.0021,0,0,1,14,16Z" transform="translate(0 0)"></path><path d="M26,9a2.9926,2.9926,0,0,0-5.8157-1H9v2H20.1843A2.9939,2.9939,0,0,0,22,11.8154V23h2V11.8159A2.9958,2.9958,0,0,0,26,9Zm-3,1a1,1,0,1,1,1-1A1.0009,1.0009,0,0,1,23,10Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
