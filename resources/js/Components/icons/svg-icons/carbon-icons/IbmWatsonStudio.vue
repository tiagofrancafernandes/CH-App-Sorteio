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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M25,21c-2.8,0-5-2.2-5-5s2.2-5,5-5s5,2.2,5,5S27.8,21,25,21z M25,13c-1.7,0-3,1.3-3,3s1.3,3,3,3s3-1.3,3-3S26.7,13,25,13z"></path><path d="M14,11V6c0-1.1-0.9-2-2-2h-2v2h2v5c0,2.1,1.1,3.9,2.7,5c-1.6,1.1-2.7,2.9-2.7,5v5h-2v2h2c1.1,0,2-0.9,2-2v-5 c0-2.2,1.8-4,4-4v-2C15.8,15,14,13.2,14,11z"></path><path d="M2,30v-6h6v6H2z M4,26v2h2v-2H4z"></path><path d="M2,19v-6h6v6H2z M4,15v2h2v-2H4z"></path><path d="M2,8V2h6v6H2z M4,4v2h2V4H4z"></path><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
