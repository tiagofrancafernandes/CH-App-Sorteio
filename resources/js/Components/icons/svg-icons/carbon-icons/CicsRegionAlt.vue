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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M31,13v-2h-4c-1.1028,0-2,.8975-2,2v2c0,1.1025,.8972,2,2,2h2v2h-4v2h4c1.1028,0,2-.8975,2-2v-2c0-1.1025-.8972-2-2-2h-2v-2h4Z"></path><path d="M17,13v6c0,1.1025,.8972,2,2,2h4v-2h-4v-6h4v-2h-4c-1.1028,0-2,.8975-2,2Z"></path><polygon points="9 13 11 13 11 19 9 19 9 21 15 21 15 19 13 19 13 13 15 13 15 11 9 11 9 13"></polygon><path d="M1,13v6c0,1.1025,.8972,2,2,2H7v-2H3v-6H7v-2H3c-1.1028,0-2,.8975-2,2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
