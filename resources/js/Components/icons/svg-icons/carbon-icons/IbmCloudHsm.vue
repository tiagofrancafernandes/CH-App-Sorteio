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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,21.142V10h-5v2h3v2h-3v2h3v5.142c-1.7203,.4471-3,1.9993-3,3.858,0,2.2061,1.7944,4,4,4s4-1.7939,4-4c0-1.8587-1.2797-3.4108-3-3.858Zm-1,5.858c-1.103,0-2-.8975-2-2s.897-2,2-2,2,.8975,2,2-.897,2-2,2Z"></path><circle cx="9" cy="24" r="1"></circle><circle cx="9" cy="8" r="1"></circle><path d="M26,6v2h2v-2c0-1.1046-.8954-2-2-2H6c-1.1046,0-2,.8954-2,2v4c0,1.1046,.8954,2,2,2h4v8H6c-1.1045,0-2,.8955-2,2v4c0,1.1045,.8955,2,2,2h14v-2H6v-4h14v-2H12V12h8v-2H6V6H26Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
