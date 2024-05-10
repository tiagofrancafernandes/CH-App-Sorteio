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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M29.3164,8.0513l-18-6A1,1,0,0,0,10.4,2.2L4,7V2H2V30H4V11l6.4,4.8a1,1,0,0,0,.9165.1489l18-6a1,1,0,0,0,0-1.8974ZM10,13,4.6665,9,10,5Zm4-.0542-2,.667V4.3872l2,.667Zm4-1.333-2,.6665V5.7207l2,.6665Zm2-.667V7.0542L25.8379,9Z" transform="translate(0 0)"></path><path d="M20,22a4,4,0,0,0-8,0h2a2,2,0,1,1,2,2H8v2h8A4.0045,4.0045,0,0,0,20,22Z" transform="translate(0 0)"></path><path d="M26,22a4.0045,4.0045,0,0,0-4,4h2a2,2,0,1,1,2,2H12v2H26a4,4,0,0,0,0-8Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
