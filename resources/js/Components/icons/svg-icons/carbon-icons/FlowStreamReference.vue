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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-1" d="M20,24H16v2h4v3h8V21H20Zm2-1h4v4H22Z" style="fill:currentColor"></path><polygon points="4 20 4 22 8.586 22 2 28.586 3.414 30 10 23.414 10 28 12 28 12 20 4 20"></polygon><path class="cls-1" d="M24,5a3.9962,3.9962,0,0,0-3.8579,3H14v2h6.1421a3.94,3.94,0,0,0,.4248,1.019L14,17.5862,15.4138,19l6.5672-6.5669A3.9521,3.9521,0,0,0,24,13a4,4,0,0,0,0-8Zm0,6a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,24,11Z" style="fill:currentColor"></path><path d="M9.6929,12.7505a5,5,0,0,1-.0005-7.5L11.0166,6.75a3,3,0,0,0-.0005,4.501Z"></path><path d="M7.0474,15.751a9,9,0,0,1,0-13.501l1.3232,1.5a7,7,0,0,0,0,10.501Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill: none"></rect></svg>

</template>
