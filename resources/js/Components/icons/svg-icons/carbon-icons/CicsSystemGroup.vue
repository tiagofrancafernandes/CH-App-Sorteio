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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,2H23V4h5V28H23v2h5a2.0059,2.0059,0,0,0,2-2V4A2.0059,2.0059,0,0,0,28,2Z" transform="translate(0 0)"></path><path d="M14,17H8a.9448.9448,0,0,0-1,1v6a.9448.9448,0,0,0,1,1h6a.9448.9448,0,0,0,1-1V18A.9448.9448,0,0,0,14,17Zm-1,6H9V19h4Z" transform="translate(0 0)"></path><path d="M25,24V18a.9448.9448,0,0,0-1-1H18a.9448.9448,0,0,0-1,1v6a.9448.9448,0,0,0,1,1h6A1.0021,1.0021,0,0,0,25,24Zm-2-1H19V19h4Z" transform="translate(0 0)"></path><path d="M14,7H8A.9448.9448,0,0,0,7,8v6a.9448.9448,0,0,0,1,1h6a.9448.9448,0,0,0,1-1V8A.9448.9448,0,0,0,14,7Zm-1,6H9V9h4Z" transform="translate(0 0)"></path><path d="M18,15h6a.9448.9448,0,0,0,1-1V8a.9448.9448,0,0,0-1-1H18a.9448.9448,0,0,0-1,1v6A1.0021,1.0021,0,0,0,18,15Zm1-6h4v4H19Z" transform="translate(0 0)"></path><path d="M4,4H9V2H4A2.0059,2.0059,0,0,0,2,4V28a2.0059,2.0059,0,0,0,2,2H9V28H4Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
