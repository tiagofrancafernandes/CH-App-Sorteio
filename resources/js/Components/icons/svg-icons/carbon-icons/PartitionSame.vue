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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m26,18c-1.8584,0-3.4106,1.2798-3.8579,3H2v2h20.1421c.4473,1.7202,1.9995,3,3.8579,3,2.2056,0,4-1.7944,4-4s-1.7944-4-4-4Zm0,6c-1.1028,0-2-.8975-2-2s.8972-2,2-2,2,.8975,2,2-.8972,2-2,2Z"></path><path d="m26,6c-1.8584,0-3.4106,1.2798-3.8579,3H2v2h20.1421c.4473,1.7202,1.9995,3,3.8579,3,2.2056,0,4-1.7944,4-4s-1.7944-4-4-4Zm0,6c-1.1028,0-2-.8975-2-2s.8972-2,2-2,2,.8975,2,2-.8972,2-2,2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
