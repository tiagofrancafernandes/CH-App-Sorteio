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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>strawberry</title><rect x="9" y="10" width="2" height="2"></rect><rect x="9" y="14" width="2" height="2"></rect><rect x="13" y="12" width="2" height="2"></rect><path d="M9,28a5.169,5.169,0,0,1-.7441-.054A5.0935,5.0935,0,0,1,4,22.8669V11.1985a7.1615,7.1615,0,0,1,6.31-7.1653,6.9607,6.9607,0,0,1,4.4643,1.0706l7.9688,4.9807a6.98,6.98,0,0,1-.6885,12.19l-10.88,5.2285A4.9765,4.9765,0,0,1,9,28ZM11.002,6q-.2484,0-.5005.0241A5.1463,5.1463,0,0,0,6,11.1985V22.8669a3.0839,3.0839,0,0,0,2.5435,3.1,3.0266,3.0266,0,0,0,1.7622-.2649l10.8828-5.23a4.9807,4.9807,0,0,0,.4887-8.6958L13.7046,6.7935A4.9687,4.9687,0,0,0,11.002,6Z"></path><path d="M26,7H22a4.0045,4.0045,0,0,1-4-4V2h2V3a2.0021,2.0021,0,0,0,2,2h4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
