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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>sleet</title><rect x="6" y="24" width="2" height="2"></rect><rect x="8" y="26" width="2" height="2"></rect><rect x="10" y="28" width="2" height="2"></rect><rect x="10" y="24" width="2" height="2"></rect><rect x="6" y="28" width="2" height="2"></rect><path d="M21,30a1,1,0,0,1-.8944-1.4474l2-4.0005a1,1,0,1,1,1.7888.8947l-2,4A.9981.9981,0,0,1,21,30Z"></path><path d="M24.8008,9.1362a8.9943,8.9943,0,0,0-17.6006,0A6.4973,6.4973,0,0,0,8.5,22h8.8818L16.106,24.5527a1,1,0,1,0,1.7885.8946L19.6177,22H23.5A6.4974,6.4974,0,0,0,24.8008,9.1362ZM23.5,20H8.5a4.4975,4.4975,0,0,1-.356-8.981l.8155-.0639.0991-.812a6.9938,6.9938,0,0,1,13.8838,0l.0986.812.8154.0639A4.4975,4.4975,0,0,1,23.5,20Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
