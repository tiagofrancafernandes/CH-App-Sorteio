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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M7.6667,27.5027,2,22.4484l1.3311-1.4927,5.6411,5.0316,7.6906-7.4449a1.9282,1.9282,0,0,1,2.6736-.0084L22.96,21.9983l5.5791-5.9735L30,17.3905l-5.5812,5.9758a1.996,1.996,0,0,1-2.8379.08l-3.5765-3.4191-7.666,7.4206A1.9629,1.9629,0,0,1,7.6667,27.5027Z"></path><polygon points="30 11 26 11 28 8 30 11"></polygon><path d="M22,4H18V6h4V8H19v2h3v2H18v2h4a2.0027,2.0027,0,0,0,2-2V6A2.0023,2.0023,0,0,0,22,4Z"></path><path d="M16,14H10V10a2.002,2.002,0,0,1,2-2h2V6H10V4h4a2.0023,2.0023,0,0,1,2,2V8a2.0023,2.0023,0,0,1-2,2H12v2h4Z"></path><polygon points="6 12 6 4 4 4 4 5 2 5 2 7 4 7 4 12 2 12 2 14 8 14 8 12 6 12"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
