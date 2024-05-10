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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,2H20a2.0023,2.0023,0,0,0-2,2V28a2.0023,2.0023,0,0,0,2,2h8a2.0023,2.0023,0,0,0,2-2V4A2.0023,2.0023,0,0,0,28,2Zm0,2v7H20V4Zm0,9v6H20V13ZM20,28V21h8v7Z"></path><polygon points="12 15 10 15 10 13 8 13 8 15 6 15 6 17 8 17 8 19 10 19 10 17 12 17 12 15"></polygon><path d="M16,6V4H10A2.0023,2.0023,0,0,0,8,6V9.08A6.99,6.99,0,0,0,8,22.92V26a2.0023,2.0023,0,0,0,2,2h6V26H10V22.92A6.99,6.99,0,0,0,10,9.08V6ZM14,16a5,5,0,1,1-5-5A5.0059,5.0059,0,0,1,14,16Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
