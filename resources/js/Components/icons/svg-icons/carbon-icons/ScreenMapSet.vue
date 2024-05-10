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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="24" y="26" width="7" height="2"></rect><rect x="24" y="22" width="7" height="2"></rect><polygon points="20.4141 12 25 12 25 10 17 10 17 18 19 18 19 13.4141 25.5859 20 27 18.5859 20.4141 12"></polygon><path d="M7,7H29v12h2V7c0-1.1025-.8972-2-2-2H7c-1.1028,0-2,.8975-2,2v15c0,1.1025,.8972,2,2,2h7v4h-4v2h12v-8H7V7Zm13,21h-4v-4h4v4Z"></path><path d="M26,3V1H3C1.8972,1,1,1.8965,1,3v15H3V3H26Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
