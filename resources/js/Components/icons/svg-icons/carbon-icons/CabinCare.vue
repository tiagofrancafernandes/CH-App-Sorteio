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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M27.3022,2a2.6617,2.6617,0,0,0-1.9079.8059l-.3931.4053-.397-.4053a2.6613,2.6613,0,0,0-3.8158,0,2.7992,2.7992,0,0,0,0,3.8963L25.0012,11,29.21,6.7022a2.7992,2.7992,0,0,0,0-3.8963A2.6613,2.6613,0,0,0,27.3022,2Z" transform="translate(0 0)"></path><path d="M23.8218,18H15.083L11.8643,5.9653a4,4,0,0,0-7.7276,2.07L8.5454,24.5168A2,2,0,0,0,10.4775,26H19v2H4v2H19a2,2,0,0,0,2-2V26h3a4.0046,4.0046,0,0,0,3.98-4.4A4.1214,4.1214,0,0,0,23.8218,18ZM24,24H10.4776L6.0686,7.5181A2,2,0,1,1,9.9324,6.4829L13.5466,20H24a2,2,0,0,1,0,4Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
