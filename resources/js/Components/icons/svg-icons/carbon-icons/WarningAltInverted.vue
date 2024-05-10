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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M16,17a1.5,1.5,0,1,0,1.5,1.5A1.5,1.5,0,0,0,16,17Z"></path><rect x="15" y="6" width="2" height="9"></rect><path d="M29.855,2.481a1.001,1.001,0,0,1,.0322.98l-13,25a1,1,0,0,1-1.7744,0l-13-25A1,1,0,0,1,3,2H29A1.0007,1.0007,0,0,1,29.855,2.481ZM4.6487,4.0033,15.998,25.8286h.004L27.3513,4.0033,27.3493,4H4.6507Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
