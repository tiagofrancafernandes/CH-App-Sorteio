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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><rect x="6" y="23" width="5" height="2"></rect><rect x="6" y="19" width="5" height="2"></rect><path d="M13,30H4c-1.1,0-2-0.9-2-2V17c0-1.1,0.9-2,2-2h9c1.1,0,2,0.9,2,2v11C15,29.1,14.1,30,13,30z M4,17v11h9V17H4z"></path><rect x="19" y="2" width="8" height="2"></rect><rect x="22" y="6" width="8" height="2"></rect><rect x="22" y="10" width="8" height="2"></rect><rect x="19" y="14" width="8" height="2"></rect><rect x="22" y="18" width="8" height="2"></rect><path d="M12,1l-1.4,1.4L13.2,5H4C2.9,5,2,5.9,2,7v5h2V7h9.2l-2.6,2.6L12,11l5-5L12,1z"></path><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
