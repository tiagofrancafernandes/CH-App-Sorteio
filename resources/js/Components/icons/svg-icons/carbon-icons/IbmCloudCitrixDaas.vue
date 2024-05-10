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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><rect x="19" y="23" width="4" height="4"></rect><rect x="26" y="23" width="4" height="4"></rect><rect x="19" y="16" width="4" height="4"></rect><rect x="26" y="16" width="4" height="4"></rect><path d="M16,4c-4.3,0-7.9,3-8.8,7.1c-3,0.6-5.2,3.3-5.2,6.4C2,21.1,4.9,24,8.5,24H16v-2H8.5C6,22,4,20,4,17.5c0-2.3,1.8-4.3,4.1-4.5 L9,13l0.1-0.8C9.5,8.6,12.5,6,16,6c3.9,0,7,3.1,7,7h2C25,8,21,4,16,4z"></path><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
