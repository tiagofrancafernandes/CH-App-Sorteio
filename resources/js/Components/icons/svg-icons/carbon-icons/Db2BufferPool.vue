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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="26.338 31 24.602 30 26.8895 26 23 26 26.993 19 28.73 20 26.4463 24 30.3367 24 26.338 31"></polygon><rect x="8" y="14" width="4" height="2"></rect><rect x="20" y="14" width="4" height="2"></rect><rect x="8" y="18" width="4" height="2"></rect><rect x="14" y="18" width="4" height="2"></rect><rect x="14" y="22" width="4" height="2"></rect><path d="M5,11H27v5h2V5c0-1.1025-.8972-2-2-2H5c-1.1028,0-2,.8975-2,2V27c0,1.1025,.8972,2,2,2h15v-2H5V11ZM27,5v4H5V5H27Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
