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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><polygon points="23.586,21.414 27.166,25 27.166,25 23.584,28.587 25,30 30,25 25,20 "></polygon><polygon points="20.414,21.414 16.834,25 16.834,25 20.416,28.587 19,30 14,25 19,20 "></polygon><rect x="22" y="6" width="2" height="8"></rect><rect x="18" y="6" width="2" height="8"></rect><path d="M14,14h-2c-1.103,0-2-0.897-2-2V8c0-1.103,0.897-2,2-2h2c1.103,0,2,0.897,2,2v4C16,13.103,15.103,14,14,14z M12,8v4h2V8H12z "></path><rect x="6" y="6" width="2" height="8"></rect><path d="M10,28H4c-1.103,0-2-0.897-2-2V4c0-1.103,0.897-2,2-2h22c1.103,0,2,0.897,2,2v12h-2V4H4v22h6V28z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
