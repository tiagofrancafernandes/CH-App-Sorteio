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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><rect x="8.7" y="5.1" transform="matrix(0.8609 -0.5088 0.5088 0.8609 -1.6464 6.1809)" width="3.5" height="2"></rect><path d="M6,12H4V9.9c0-0.7,0.4-1.4,1-1.7l1.5-0.9l1,1.7L6,9.9V12z"></path><rect x="4" y="14" width="2" height="4"></rect><path d="M6.5,24.7L5,23.8c-0.6-0.4-1-1-1-1.7V20h2v2.1L7.5,23L6.5,24.7z"></path><rect x="9.5" y="24.1" transform="matrix(0.5087 -0.8609 0.8609 0.5087 -17.1488 21.7453)" width="2" height="3.5"></rect><path d="M17.5,27.1L16,28l-1.5-0.9l-1,1.7l1.5,0.9c0.3,0.2,0.7,0.3,1,0.3c0.4,0,0.7-0.1,1-0.3l1.5-0.9L17.5,27.1z"></path><rect x="19.8" y="24.9" transform="matrix(0.8609 -0.5088 0.5088 0.8609 -10.1928 14.5447)" width="3.5" height="2"></rect><path d="M25.2,24.9l-1-1.7l1.8-1V20h2v2.1c0,0.7-0.4,1.4-1,1.7L25.2,24.9z"></path><rect x="26" y="14" width="2" height="4"></rect><path d="M28,12h-2V9.9l-1.8-1l1-1.7l1.8,1c0.6,0.4,1,1,1,1.7V12z"></path><rect x="20.5" y="4.3" transform="matrix(0.5087 -0.8609 0.8609 0.5087 5.321 21.5017)" width="2" height="3.5"></rect><path d="M17.5,4.9L16,4l-1.5,0.9l-1-1.7L15,2.3C15.3,2.1,15.6,2,16,2c0.4,0,0.7,0.1,1,0.3l1.5,0.9L17.5,4.9z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
