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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="13" y="22" width="6" height="2"></rect><path d="m2,18v2h2v8c0,1.1025.8972,2,2,2h20c1.1028,0,2-.8975,2-2v-8h2v-2H2Zm24,10H6v-8h20v8Z"></path><path d="m29,16h-5c-1.1025,0-2-.8975-2-2v-6c0-1.103.8975-2,2-2h5v2h-5v6h5v2Z"></path><path d="m18,6h-4v-4h-2v14h6c1.1025,0,2-.8975,2-2v-6c0-1.103-.8975-2-2-2Zm-4,8v-6h4v6h-4Z"></path><path d="m8,6H3v2h5v2h-4c-1.1046,0-2,.8954-2,2v2c0,1.1046.8954,2,2,2h6V8c0-1.103-.8975-2-2-2Zm0,8h-4v-2h4v2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
