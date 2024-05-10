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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M16,3c-5.2979,0-11,1.252-11,4V25c0,2.748,5.7021,4,11,4s11-1.252,11-4V7c0-2.748-5.7021-4-11-4Zm0,2c5.7976,0,8.7949,1.4341,8.9968,2-.2019,.5659-3.1992,2-8.9968,2-5.8413,0-8.8394-1.4556-9-1.9824v-.0049c.1606-.5571,3.1587-2.0127,9-2.0127ZM7,9.4277c2.1279,1.0674,5.6426,1.5723,9,1.5723s6.8721-.5049,9-1.5723v3.5596c-.1606,.5571-3.1587,2.0127-9,2.0127-5.8501,0-8.8491-1.46-9-2v-3.5723Zm0,6c2.1279,1.0674,5.6426,1.5723,9,1.5723s6.8721-.5049,9-1.5723v3.5596c-.1606,.5571-3.1587,2.0127-9,2.0127-5.8501,0-8.8491-1.46-9-2v-3.5723Zm9,11.5723c-5.8501,0-8.8491-1.46-9-2v-3.5723c2.1279,1.0674,5.6426,1.5723,9,1.5723s6.8721-.5049,9-1.5723v3.5596c-.1606,.5571-3.1587,2.0127-9,2.0127Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
