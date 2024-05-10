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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M24,17H18a1.0008,1.0008,0,0,1-1-1V4a2.0025,2.0025,0,0,0-2-2H5A2.0025,2.0025,0,0,0,3,4V28a2.0025,2.0025,0,0,0,2,2H27a2.0025,2.0025,0,0,0,2-2V22A5.0057,5.0057,0,0,0,24,17Zm3,5v2H23V19h1A3.0033,3.0033,0,0,1,27,22ZM15,4V6H11V8h4v2H11v2h4v2H11v2h4a3.0033,3.0033,0,0,0,3,3h3v5H14.1624l-3-1H5V4ZM25,28V27H23v1H21V27H19v1H17V27H15v1H13V27H11v1H5V25h5.8376l3,1H27v2Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
