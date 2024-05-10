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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M13,26h-2c-3.9,0-7-3.1-7-7v-2h2v2c0,2.8,2.2,5,5,5h2V26z"></path><path d="M18,18h10c1.1,0,2,0.9,2,2v6c0,1.1-0.9,2-2,2h-2.4l-1.7,3l-1.7-1l2.3-4H28v-6H18v6h3v2h-3c-1.1,0-2-0.9-2-2v-6 C16,18.9,16.9,18,18,18z"></path><path d="M28,14h-2v-2c0-2.8-2.2-5-5-5h-4V5h4c3.9,0,7,3.1,7,7V14z"></path><rect x="2" y="11" width="6" height="2"></rect><rect x="2" y="7" width="12" height="2"></rect><rect x="2" y="3" width="12" height="2"></rect><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
