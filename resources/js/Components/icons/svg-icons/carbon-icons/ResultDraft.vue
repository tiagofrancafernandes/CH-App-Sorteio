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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M29.7,19.3l-3-3c-0.4-0.4-1-0.4-1.4,0L16,25.6V30h4.4l9.3-9.3C30.1,20.3,30.1,19.7,29.7,19.3z M19.6,28H18v-1.6l5-5l1.6,1.6 L19.6,28z M26,21.6L24.4,20l1.6-1.6l1.6,1.6L26,21.6z"></path><rect x="10" y="23" width="2" height="2"></rect><rect x="14" y="18" width="4" height="2"></rect><rect x="10" y="18" width="2" height="2"></rect><rect x="14" y="13" width="8" height="2"></rect><rect x="10" y="13" width="2" height="2"></rect><path d="M7,28V7h3v3h12V7h3v6h2V7c0-1.1-0.9-2-2-2h-3V4c0-1.1-0.9-2-2-2h-8c-1.1,0-2,0.9-2,2v1H7C5.9,5,5,5.9,5,7v21 c0,1.1,0.9,2,2,2h5v-2H7z M12,4h8v4h-8V4z"></path><rect id="_x3C_Transparent_Rectangle_x3E__155_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
