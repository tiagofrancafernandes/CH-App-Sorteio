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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M8,18c-3.3,0-6,2.7-6,6s2.7,6,6,6s6-2.7,6-6C14,20.7,11.3,18,8,18z M8,28c-2.2,0-4-1.8-4-4s1.8-4,4-4s4,1.8,4,4 C12,26.2,10.2,28,8,28z"></path><path d="M30,24h-2C28,13,19,4,8,4V2C20.1,2,30,11.9,30,24z"></path><path d="M22,24h-2c0-6.6-5.4-12-12-12v-2C15.7,10,22,16.3,22,24z"></path><rect id="_x3C_Transparent_Rectangle_x3E_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
