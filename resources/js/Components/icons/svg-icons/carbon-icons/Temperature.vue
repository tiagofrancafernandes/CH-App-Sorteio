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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>temperature</title><path d="M13,17.26V6A4,4,0,0,0,5,6V17.26a7,7,0,1,0,8,0ZM9,4a2,2,0,0,1,2,2v7H7V6A2,2,0,0,1,9,4ZM9,28a5,5,0,0,1-2.5-9.33l.5-.28V15h4v3.39l.5.28A5,5,0,0,1,9,28Z" transform="translate(0 0)"></path><rect x="20" y="4" width="10" height="2"></rect><rect x="20" y="10" width="7" height="2"></rect><rect x="20" y="16" width="10" height="2"></rect><rect x="20" y="22" width="7" height="2"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
