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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><rect x="20" y="25" width="7" height="2"></rect><rect x="22" y="29" width="3" height="2"></rect><path d="M27,23h-2c0-1.1,0.4-2,1.2-2.8l0.5-0.5c0.8-0.8,1.3-2,1.3-3.2c0-2.5-2-4.5-4.5-4.5S19,14,19,16.5c0,1.2,0.5,2.3,1.3,3.2 l0.5,0.5C21.6,21,22,21.9,22,23h-2c0-0.5-0.2-1-0.6-1.4l-0.5-0.5c-1.2-1.2-1.9-2.9-1.9-4.6c0-3.6,2.9-6.5,6.5-6.5s6.5,2.9,6.5,6.5 c0,1.7-0.7,3.4-1.9,4.6l-0.5,0.5C27.2,22,27,22.5,27,23z"></path><rect x="6" y="22" width="8" height="2"></rect><circle cx="12" cy="19" r="1"></circle><rect x="6" y="18" width="3" height="2"></rect><rect x="6" y="14" width="7" height="2"></rect><rect x="10" y="10" width="7" height="2"></rect><circle cx="7" cy="11" r="1"></circle><rect x="16" y="6" width="4" height="2"></rect><circle cx="13" cy="7" r="1"></circle><rect x="6" y="6" width="4" height="2"></rect><path d="M18,28H4V4l18,0v4h2V4c0-1.1-0.9-2-2-2H4C2.9,2,2,2.9,2,4v24c0,1.1,0.9,2,2,2h14V28z"></path><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
