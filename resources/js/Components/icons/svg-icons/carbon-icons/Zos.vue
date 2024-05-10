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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M30,22h-5v-2h5v-3h-3c-1.1028,0-2-.8972-2-2v-3c0-1.1028,.8972-2,2-2h5v2h-5v3h3c1.1028,0,2,.8972,2,2v3c0,1.1028-.8972,2-2,2Z"></path><path d="M21,22h-3c-1.1028,0-2-.8972-2-2V12c0-1.1028,.8972-2,2-2h3c1.1028,0,2,.8972,2,2v8c0,1.1028-.8972,2-2,2Zm-3-10v8h3V12h-3Z"></path><polygon points="11.9458 10 7.9458 22 10.0542 22 14.0542 10 11.9458 10"></polygon><polygon points="6 22 0 22 0 19.6973 3.7981 14 0 14 0 12 6 12 6 14.3027 2.2019 20 6 20 6 22"></polygon><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" x="0" width="32" height="32" style="fill: none"></rect></svg>

</template>
