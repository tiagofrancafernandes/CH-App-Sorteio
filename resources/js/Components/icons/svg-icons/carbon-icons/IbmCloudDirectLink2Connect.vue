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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M17.2,13c0.4,1.2,1.5,2,2.8,2c1.7,0,3-1.3,3-3s-1.3-3-3-3c-1.3,0-2.4,0.8-2.8,2H5c-1.1,0-2,0.9-2,2v6H0v2h3v6 c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2v-4h-2v4H5V13H17.2z M20,11c0.6,0,1,0.4,1,1s-0.4,1-1,1s-1-0.4-1-1S19.4,11,20,11z"></path><path d="M29,11V5c0-1.1-0.9-2-2-2H13c-1.1,0-2,0.9-2,2v4h2V5h14v14H14.8c-0.4-1.2-1.5-2-2.8-2c-1.7,0-3,1.3-3,3s1.3,3,3,3 c1.3,0,2.4-0.8,2.8-2H27c1.1,0,2-0.9,2-2v-6h3v-2H29z M12,21c-0.6,0-1-0.4-1-1s0.4-1,1-1s1,0.4,1,1S12.6,21,12,21z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
