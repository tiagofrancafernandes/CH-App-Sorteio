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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M32,22v-2h-3v-2h-2v2h-1v2h1v6c0,1.1025,.8975,2,2,2h3v-2h-3v-6h3Z"></path><path d="M23,30h-3c-1.1025,0-2-.8975-2-2v-6c0-1.103,.8975-2,2-2h3c1.1025,0,2,.897,2,2v6c0,1.1025-.8975,2-2,2Zm-3-8v6h3v-6h-3Z"></path><path d="M14,30h-3c-1.1025,0-2-.8975-2-2v-6c0-1.103,.8975-2,2-2h3c1.1025,0,2,.897,2,2v6c0,1.1025-.8975,2-2,2Zm-3-8v6h3v-6h-3Z"></path><path d="M5,20H2v-4H0v14H5c1.1025,0,2-.8975,2-2v-6c0-1.103-.8975-2-2-2Zm-3,8v-6h3v6H2Z"></path><path d="M4,14V5h7.5857l4,4h12.4143v7h2v-7c-.0013-1.1041-.8959-1.9987-2-2h-11.5857l-3.4143-3.4141c-.3742-.3764-.8835-.5873-1.4143-.5859H4c-1.1041,.0013-1.9987,.8959-2,2V14h2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
