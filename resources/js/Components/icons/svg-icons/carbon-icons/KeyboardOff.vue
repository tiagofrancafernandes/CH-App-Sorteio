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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><rect x="6" y="12" width="2" height="2"></rect><rect x="18" y="12" width="2" height="2"></rect><rect x="6" y="20" width="2" height="2"></rect><rect x="6" y="16" width="2" height="2"></rect><rect x="10" y="16" width="2" height="2"></rect><rect x="22" y="12" width="4" height="2"></rect><rect x="22" y="16" width="4" height="2"></rect><path d="M14.2,10H28v13h2V10c0-1.1-0.9-2-2-2H12.2L14.2,10z"></path><path d="M30,28.6L3.4,2L2,3.4L6.6,8H4c-1.1,0-2,0.9-2,2v14c0,1.1,0.9,2,2,2h20.6l4,4L30,28.6z M4,24V10h4.6l2,2H10v2h2.6l2,2H14v2 h2.6l2,2H10v2h10.6l2,2H4z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
