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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="27.167 16.89 21.72 13 27.167 9.109 29.684 9.948 30.316 8.051 28 7.279 28 5 26 5 26 7.485 21 11.057 21 5.367 23.555 3.664 22.445 2 20 3.63 17.555 2 16.445 3.664 19 5.367 19 11.057 16 8.914 16 11.372 18.28 13 16 14.628 16 17.086 19 14.943 19 21.703 22.445 24 23.555 22.336 21 20.633 21 14.943 26 18.515 26 21 28 21 28 18.721 30.316 17.948 29.684 16.051 27.167 16.89"></polygon><path d="M12,23a3,3,0,0,1-6,0Z"></path><path d="M9,30A6.9931,6.9931,0,0,1,4,18.1108V7A5,5,0,0,1,14,7V18.1108A6.9931,6.9931,0,0,1,9,30ZM9,4A3.0033,3.0033,0,0,0,6,7V18.9834l-.332.2983a5,5,0,1,0,6.664,0L12,18.9834V7A3.0033,3.0033,0,0,0,9,4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
