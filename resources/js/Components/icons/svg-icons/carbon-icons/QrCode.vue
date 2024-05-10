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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>qr-code</title><rect x="24" y="26" width="2" height="2" transform="translate(-2 52) rotate(-90)"></rect><rect x="18" y="22" width="2" height="2" transform="translate(-4 42) rotate(-90)"></rect><polygon points="18 30 22 30 22 28 20 28 20 26 18 26 18 30"></polygon><rect x="24.9999" y="23" width="4" height="2" transform="translate(2.9999 50.9999) rotate(-90)"></rect><polygon points="28 26 30 26 30 30 26 30 26 28 28 28 28 26"></polygon><polygon points="26 20 26 18 30 18 30 22 28 22 28 20 26 20"></polygon><polygon points="24 20 22 20 22 24 20 24 20 26 24 26 24 20"></polygon><rect x="19" y="17" width="2" height="4" transform="translate(1 39) rotate(-90)"></rect><rect x="6" y="22" width="4" height="4"></rect><path d="M14,30H2V18H14ZM4,28h8V20H4Z"></path><rect x="22" y="6" width="4" height="4"></rect><path d="M30,14H18V2H30ZM20,12h8V4H20Z"></path><rect x="6" y="6" width="4" height="4"></rect><path d="M14,14H2V2H14ZM4,12h8V4H4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
