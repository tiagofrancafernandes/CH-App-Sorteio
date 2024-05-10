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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="27 25.5859 25 23.5859 25 21 23 21 23 24.4141 25.5859 27 27 25.5859"></polygon><path d="m24,31c-3.8599,0-7-3.1401-7-7s3.1401-7,7-7,7,3.1401,7,7-3.1401,7-7,7Zm0-12c-2.7571,0-5,2.2429-5,5s2.2429,5,5,5,5-2.2429,5-5-2.2429-5-5-5Z"></path><path d="m28,15h2V5c0-1.103-.8975-2-2-2h-3v2h3v10Z"></path><circle cx="9" cy="13" r="2"></circle><circle cx="16" cy="13" r="2"></circle><circle cx="23" cy="13" r="2"></circle><path d="m7,23h-3c-1.103,0-2-.8975-2-2V5c0-1.103.897-2,2-2h3v2h-3v16h3v2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
