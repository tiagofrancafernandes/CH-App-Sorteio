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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m23,23c-5.6558,0-7.8577-6.4109-7.9487-6.6837-.0173-.0514-1.8435-5.3163-6.0513-5.3163-2.7571,0-5,2.243-5,5s2.2429,5,5,5c1.5876,0,3.0134-.7322,4.2373-2.1764l1.5259,1.2932c-1.5989,1.8862-3.5916,2.8832-5.7632,2.8832-3.8599,0-7-3.1401-7-7s3.1401-7,7-7c5.6558,0,7.8577,6.4109,7.9487,6.6837.0173.0514,1.8435,5.3163,6.0513,5.3163,2.7571,0,5-2.243,5-5s-2.2429-5-5-5c-1.5876,0-3.0134.7322-4.2373,2.1764l-1.5259-1.2932c1.5989-1.8862,3.5916-2.8832,5.7632-2.8832,3.8599,0,7,3.1401,7,7s-3.1401,7-7,7Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
