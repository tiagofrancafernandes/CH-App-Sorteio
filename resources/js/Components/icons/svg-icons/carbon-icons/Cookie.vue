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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><circle cx="10" cy="21" r="2"></circle><circle cx="23" cy="20" r="2"></circle><circle cx="13" cy="10" r="2"></circle><circle cx="14" cy="15" r="1"></circle><circle cx="23" cy="5" r="2"></circle><circle cx="29" cy="3" r="1"></circle><circle cx="16" cy="23" r="1"></circle><path d="M16,30C8.3,30,2,23.7,2,16S8.3,2,16,2c0.1,0,0.2,0,0.3,0l1.4,0.1l-0.3,1.2c-0.1,0.4-0.2,0.9-0.2,1.3c0,2.8,2.2,5,5,5 c1,0,2-0.3,2.9-0.9l1.3,1.5c-0.4,0.4-0.6,0.9-0.6,1.4c0,1.3,1.3,2.4,2.7,1.9l1.2-0.5l0.2,1.3C30,14.9,30,15.5,30,16 C30,23.7,23.7,30,16,30z M15.3,4C9,4.4,4,9.6,4,16c0,6.6,5.4,12,12,12s12-5.4,12-12c0-0.1,0-0.3,0-0.4c-2.3,0.1-4.2-1.7-4.2-4 c0-0.1,0-0.1,0-0.2c-0.5,0.1-1,0.2-1.6,0.2c-3.9,0-7-3.1-7-7C15.2,4.4,15.2,4.2,15.3,4z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
