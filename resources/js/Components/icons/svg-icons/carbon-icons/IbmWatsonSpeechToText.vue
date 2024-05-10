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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M14,18H4c-1.1,0-2,0.9-2,2v6c0,1.1,0.9,2,2,2h2.4l1.7,3l1.7-1l-2.3-4H4v-6h10v6h-3v2h3c1.1,0,2-0.9,2-2v-6 C16,18.9,15.1,18,14,18z"></path><path d="M19,26h2c3.9,0,7-3.1,7-7v-2h-2v2c0,2.8-2.2,5-5,5h-2V26z"></path><rect x="18" y="11" width="6" height="2"></rect><rect x="18" y="7" width="12" height="2"></rect><rect x="18" y="3" width="12" height="2"></rect><path d="M4,14h2v-2c0-2.8,2.2-5,5-5h4V5h-4c-3.9,0-7,3.1-7,7V14z"></path><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
