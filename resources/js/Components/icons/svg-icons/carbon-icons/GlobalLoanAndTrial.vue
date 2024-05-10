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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m15,22l-1.4099,1.4102,2.5798,2.5898H4V8h-2v18c0,1.1025.8972,2,2,2h12.1699l-2.5798,2.5898,1.4099,1.4102,5-5-5-5Z"></path><circle cx="11" cy="16" r="1"></circle><path d="m24,20H8c-1.1028,0-2-.8972-2-2v-4c0-1.1028.8972-2,2-2h16c1.1028,0,2,.8972,2,2v4c0,1.1028-.8972,2-2,2Zm-16-6v4h16v-4H8Z"></path><path d="m28,4h-12.1699l2.5801-2.5898L17,0l-5,5,5,5,1.4102-1.4102-2.5801-2.5898h12.1699v18h2V6c0-1.1025-.8972-2-2-2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
