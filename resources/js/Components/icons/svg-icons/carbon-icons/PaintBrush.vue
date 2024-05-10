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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>paint-brush</title><path d="M28.83,23.17,23,17.33V13a1,1,0,0,0-.29-.71l-10-10a1,1,0,0,0-1.42,0l-9,9a1,1,0,0,0,0,1.42l10,10A1,1,0,0,0,13,23h4.34l5.83,5.84a4,4,0,0,0,5.66-5.66ZM6,10.41l2.29,2.3,1.42-1.42L7.41,9,9,7.41l4.29,4.3,1.42-1.42L10.41,6,12,4.41,18.59,11,11,18.59,4.41,12Zm21.41,17a2,2,0,0,1-2.82,0l-6.13-6.12a1.8,1.8,0,0,0-.71-.29H13.41l-1-1L20,12.41l1,1v4.34a1,1,0,0,0,.29.7l6.12,6.14a2,2,0,0,1,0,2.82Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
