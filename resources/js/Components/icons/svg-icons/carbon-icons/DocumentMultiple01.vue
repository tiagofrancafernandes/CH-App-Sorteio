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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><rect x="2" y="6" width="2" height="20"></rect><rect x="6" y="4" width="2" height="24"></rect><rect x="14" y="22" width="12" height="2"></rect><rect x="14" y="16" width="12" height="2"></rect><path d="M29.7,9.3l-7-7C22.5,2.1,22.3,2,22,2H12c-1.1,0-2,0.9-2,2v24c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V10 C30,9.7,29.9,9.5,29.7,9.3z M22,4.4l5.6,5.6H22V4.4z M28,28H12V4h8v6c0,1.1,0.9,2,2,2h6V28z"></path><rect id="_x3C_Transparent_Rectangle_x3E__155_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
