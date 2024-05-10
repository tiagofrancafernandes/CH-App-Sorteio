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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M17,26c-3.6162,0-6.3328-2.2974-7.4456-6H19V18H9.1321A15.2782,15.2782,0,0,1,9,16c0-.33.01-.6641.0259-1H19V13H9.2371C9.8447,9.3525,11.81,6,17,6c3.8533,0,5.5315,1.6465,7.1282,4.4893l1.7436-.9786C24.2649,6.6484,22.0779,4,17,4,10.6448,4,7,8.374,7,16c0,7.0654,4.1121,12,10,12,5.0779,0,7.2649-2.6484,8.8718-5.5107l-1.7436-.9786C22.5315,24.3535,20.8533,26,17,26Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
