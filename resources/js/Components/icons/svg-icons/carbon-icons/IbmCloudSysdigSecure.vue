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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M25,14l-2.1-1c-1.7-0.8-2.9-2.6-2.9-4.5V2h10v6.5c0,1.9-1.1,3.7-2.9,4.5L25,14z M22,4v4.5c0,1.2,0.7,2.2,1.7,2.7l1.3,0.6 l1.3-0.6c1-0.5,1.7-1.6,1.7-2.7V4H22z"></path><path d="M28,16v6H4V6h12V4H4C2.9,4,2,4.9,2,6v16c0,1.1,0.9,2,2,2h8v4H8v2h16v-2h-4v-4h8c1.1,0,2-0.9,2-2v-6H28z M18,28h-4v-4h4V28z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
