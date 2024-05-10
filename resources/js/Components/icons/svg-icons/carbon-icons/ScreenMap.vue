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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="22" y="25" width="8" height="2"></rect><rect x="22" y="21" width="8" height="2"></rect><polygon points="18.4141 11 23 11 23 9 15 9 15 17 17 17 17 12.4141 23.5859 19 25 17.5859 18.4141 11"></polygon><path d="M28,3H4c-1.1028,0-2,.8975-2,2V21c0,1.1025,.8972,2,2,2H12v4h-4v2h12v-8H4V5H28v14h2V5c0-1.1025-.8972-2-2-2Zm-10,24h-4v-4h4v4Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
