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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M27,22.1V13h-2v9.1c-1.4,0.4-2.5,1.5-2.9,2.9H13v2h9.1c0.4,1.7,2,3,3.9,3c2.2,0,4-1.8,4-4C30,24.1,28.7,22.6,27,22.1z M26,28c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S27.1,28,26,28z"></path><path d="M10,30H2v-8h8V30z M4,28h4v-4H4V28z"></path><path d="M9.9,7H19V5H9.9C9.4,3.3,7.9,2,6,2C3.8,2,2,3.8,2,6c0,1.9,1.3,3.4,3,3.9V19h2V9.9C8.4,9.5,9.5,8.4,9.9,7z M6,8 C4.9,8,4,7.1,4,6s0.9-2,2-2s2,0.9,2,2S7.1,8,6,8z"></path><polygon points="22,2 22,4 26.6,4 11,19.6 12.4,21 28,5.4 28,10 30,10 30,2 "></polygon><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
