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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M31,29.5859l-4.6885-4.6884a8.028,8.028,0,1,0-1.414,1.414L29.5859,31ZM20,26a6,6,0,1,1,6-6A6.0066,6.0066,0,0,1,20,26Z"></path><path d="M8,26H4a2.0021,2.0021,0,0,1-2-2V20H4v4H8Z"></path><rect x="2" y="12" width="2" height="4"></rect><path d="M26,8H24V4H20V2h4a2.0021,2.0021,0,0,1,2,2Z"></path><rect x="12" y="2" width="4" height="2"></rect><path d="M4,8H2V4A2.0021,2.0021,0,0,1,4,2H8V4H4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
