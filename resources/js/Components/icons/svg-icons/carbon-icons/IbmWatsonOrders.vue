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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M28,13h-2v-2c0-2.8-2.2-5-5-5h-3V4h3c3.9,0,7,3.1,7,7V13z"></path><rect x="22" y="20" width="3" height="2"></rect><rect x="22" y="24" width="3" height="2"></rect><path d="M27,30h-5v-2h5V18h-7v9c0,1.7-1.3,3-3,3s-3-1.3-3-3v-3h2v3c0,0.6,0.4,1,1,1s1-0.4,1-1V16h11v12C29,29.1,28.1,30,27,30z"></path><path d="M12,28h-1c-3.9,0-7-3.1-7-7v-4h2v4c0,2.8,2.2,5,5,5h1V28z"></path><path d="M11,10v2h3c1.1,0,2-0.9,2-2V4c0-1.1-0.9-2-2-2H4C2.9,2,2,2.9,2,4v6c0,1.1,0.9,2,2,2h2.4l1.7,3l1.7-1l-2.3-4H4V4h10v6H11z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
