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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="16" cy="13.5" r="1.5"></circle><path d="M19.5356,10.4648a5,5,0,0,0-7.0717,0L11.05,9.0508a6.9992,6.9992,0,0,1,9.9,0Z" transform="translate(0 0)"></path><path d="M23.0713,6.929a10,10,0,0,0-14.1426,0L7.5146,5.5144a12.0011,12.0011,0,0,1,16.9708,0Z" transform="translate(0 0)"></path><polygon points="21 25 16 30 11 25 12.409 23.581 15 26.153 15 19 17 19 17 26.206 19.591 23.581 21 25"></polygon><polygon points="24 11 19 16 24 21 25.419 19.591 22.847 17 30 17 30 15 22.794 15 25.419 12.409 24 11"></polygon><polygon points="8 11 13 16 8 21 6.581 19.591 9.153 17 2 17 2 15 9.206 15 6.581 12.409 8 11"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
