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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="20.17 19 17.58 21.59 19 23 23 19 19 15 17.58 16.41 20.17 19"></polygon><polygon points="11.83 19 14.42 16.41 13 15 9 19 13 23 14.42 21.59 11.83 19"></polygon><circle cx="9" cy="8" r="1"></circle><circle cx="6" cy="8" r="1"></circle><path d="M28,4H4c-1.1028,0-2,.8975-2,2V26c0,1.1025,.8972,2,2,2H28c1.1028,0,2-.8975,2-2V6c0-1.1025-.8972-2-2-2Zm0,2v4H4V6H28ZM4,26V12H28v14H4Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
