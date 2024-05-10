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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>health-cross</title><path d="M19,28H13a2.0023,2.0023,0,0,1-2-2V21H6a2.0023,2.0023,0,0,1-2-2V13a2.002,2.002,0,0,1,2-2h5V6a2.002,2.002,0,0,1,2-2h6a2.0023,2.0023,0,0,1,2,2v5h5a2.0023,2.0023,0,0,1,2,2v6a2.0027,2.0027,0,0,1-2,2H21v5A2.0027,2.0027,0,0,1,19,28ZM6,13v6h7v7h6V19h7V13H19V6H13v7Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
