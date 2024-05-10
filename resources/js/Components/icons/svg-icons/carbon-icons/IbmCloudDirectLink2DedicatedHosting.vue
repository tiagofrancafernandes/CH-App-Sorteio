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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M19,27H5V13h4v-2H5c-1.1,0-2,0.9-2,2v6H0v2h3v6c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2v-4h-2V27z"></path><rect x="11" y="19" width="10" height="2"></rect><rect x="11" y="15" width="10" height="2"></rect><rect x="11" y="11" width="10" height="2"></rect><path d="M29,11V5c0-1.1-0.9-2-2-2H13c-1.1,0-2,0.9-2,2v4h2V5h14v14h-4v2h4c1.1,0,2-0.9,2-2v-6h3v-2H29z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
