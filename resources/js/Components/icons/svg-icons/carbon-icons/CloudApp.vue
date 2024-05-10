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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>fog</title><path d="M25.8289,13.1155A10.02,10.02,0,0,0,16,5.0005V7a8.0233,8.0233,0,0,1,7.8649,6.4934l.2591,1.346,1.3488.2441A5.5019,5.5019,0,0,1,24.5076,26H16v2h8.5076a7.5019,7.5019,0,0,0,1.3213-14.8845Z"></path><rect x="8" y="24" width="6" height="2"></rect><rect x="4" y="24" width="2" height="2"></rect><rect x="6" y="20" width="8" height="2"></rect><rect x="2" y="20" width="2" height="2"></rect><rect x="8" y="16" width="6" height="2"></rect><rect x="4" y="16" width="2" height="2"></rect><rect x="10" y="12" width="4" height="2"></rect><rect x="6" y="12" width="2" height="2"></rect><rect x="12" y="8" width="2" height="2"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
