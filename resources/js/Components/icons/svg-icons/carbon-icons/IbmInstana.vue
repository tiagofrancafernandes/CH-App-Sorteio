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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="9" y="13" width="2" height="6"></rect><rect x="21" y="13" width="2" height="6"></rect><rect x="13" y="11" width="2" height="13"></rect><rect x="17" y="9" width="2" height="13"></rect><circle cx="22" cy="5" r="2"></circle><circle cx="10" cy="27" r="2"></circle><path d="m22.0916,28h-8.0916v-2h8.0916l5.9082-10-2.6992-4.5679,1.7227-1.0176,2.6992,4.5679c.3701.6274.3701,1.4077,0,2.0352l-5.9092,10c-.3574.6055-1.0176.9824-1.7217.9824Z"></path><path d="m4.9768,21.5859l-2.6992-4.5684c-.3701-.6274-.3701-1.4077,0-2.0352l5.9092-10c.3584-.606,1.0176-.9824,1.7217-.9824h8.0916v2h-8.0916l-5.9082,10,2.6992,4.5684-1.7227,1.0176Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
