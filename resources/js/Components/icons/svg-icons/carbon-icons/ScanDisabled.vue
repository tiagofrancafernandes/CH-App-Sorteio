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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M29.3826,2.0762a.9993.9993,0,0,0-1.09.2168l-26,26A1,1,0,0,0,3,30h8V28H5.4143l4-4H22a2.0021,2.0021,0,0,0,2-2V9.4146l4-4V11h2V3A1,1,0,0,0,29.3826,2.0762ZM22,22H11.4143L22,11.4146Z"></path><path d="M10,17.7554V10h7.7554l2-2H10a2.0025,2.0025,0,0,0-2,2v9.7554Z"></path><polygon points="11 2 2 2 2 11 4 11 4 4 11 4 11 2"></polygon><polygon points="21 30 30 30 30 21 28 21 28 28 21 28 21 30"></polygon><polygon points="4 23.755 4 21 2 21 2 25.754 4 23.755"></polygon><polygon points="25.755 2 21 2 21 4 23.755 4 25.755 2"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
