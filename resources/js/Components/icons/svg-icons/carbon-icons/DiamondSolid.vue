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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m29.3906,14.5269L17.4731,2.6094c-.406-.4062-.9397-.6094-1.4731-.6094s-1.0671.2031-1.4731.6094L2.6094,14.5269c-.4062.4062-.6094.9395-.6094,1.4731s.2031,1.0669.6094,1.4731l11.9175,11.9175c.406.4062.9397.6094,1.4731.6094s1.0671-.2031,1.4731-.6094l11.9175-11.9175c.4062-.4062.6094-.9395.6094-1.4731s-.2031-1.0669-.6094-1.4731Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" transform="translate(0 32) rotate(-90)" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
