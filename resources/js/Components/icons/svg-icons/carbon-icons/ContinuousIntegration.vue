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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M31.9,15.5l-5.7-10C25.9,5.2,25.6,5,25.3,5H6.7C6.4,5,6.1,5.2,5.9,5.5l-5.7,10C0,15.7,0,15.8,0,16s0,0.3,0.1,0.5l5.7,10 C6.1,26.8,6.4,27,6.7,27h18.5c0.4,0,0.7-0.2,0.9-0.5l5.7-10C32,16.3,32,16.2,32,16S32,15.7,31.9,15.5z M17.8,15h-8l4-7L17.8,15z M15.5,7h8l-4,7L15.5,7z M17.8,17l-4,7l-4-7H17.8z M19.5,18l4,7h-8L19.5,18z M21.2,17h8l-4,7L21.2,17z M21.2,15l4-7l4,7H21.2z M7.3,7H12l-4.6,8H2.7L7.3,7z M7.3,25l-4.6-8h4.7l4.6,8H7.3z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
