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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="22 22 24 22 24 28 22 28 22 30 28 30 28 28 26 28 26 22 28 22 28 20 22 20 22 22"></polygon><path d="M18,28H16V20H14v8.6A1.4529,1.4529,0,0,0,15.5,30h3A1.4529,1.4529,0,0,0,20,28.6V20H18Z" transform="translate(0 0)"></path><polygon points="10.2 20 10 28.5 9 22 7 22 6 28.5 5.8 20 4 20 4.72 30 7 30 8 23.5 9 30 11.28 30 12 20 10.2 20"></polygon><polygon points="16 11 13 11 13 8 11 8 11 11 8 11 8 13 11 13 11 16 13 16 13 13 16 13 16 11"></polygon><path d="M26,4H6A2.0059,2.0059,0,0,0,4,6V18H6V6H26V18h2V6A2.0059,2.0059,0,0,0,26,4Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
