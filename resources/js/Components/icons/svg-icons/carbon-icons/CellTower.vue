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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><polygon points="25,11 25,16 17,16 17,11 15,11 15,16 7,16 7,11 5,11 5,23 7,23 7,18 10,18 10,30 12,30 12,18 15,18 15,23 17,23 17,18 20,18 20,30 22,30 22,18 25,18 25,23 27,23 27,11 "></polygon><path d="M16,6c-1.7,0-3.2,0.7-4.2,1.8l1.4,1.4C13.9,8.4,14.9,8,16,8s2.1,0.4,2.8,1.2l1.4-1.4C19.2,6.7,17.7,6,16,6z"></path><path d="M8.9,4.9l1.4,1.4C11.8,4.9,13.8,4,16,4s4.2,0.9,5.7,2.3l1.4-1.4C21.3,3.1,18.8,2,16,2S10.7,3.1,8.9,4.9z"></path><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
