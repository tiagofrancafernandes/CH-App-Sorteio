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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="12" y="24" width="9" height="2"></rect><rect x="13" y="28" width="6" height="2"></rect><path d="M8.7832,18.9746l1.4177-1.418A6.9206,6.9206,0,0,1,8,12,7.99,7.99,0,0,1,21.5273,6.2305l1.4136-1.4136A9.9884,9.9884,0,0,0,6,12,8.9411,8.9411,0,0,0,8.7832,18.9746Z" transform="translate(0 0)"></path><path d="M30,3.4141,28.5859,2,2,28.5859,3.4141,30,23.6606,9.7534A7.7069,7.7069,0,0,1,24,12a7.2032,7.2032,0,0,1-2.8223,6.1426C20.1069,19.1348,19,20.1611,19,22h2c0-.9194.5264-1.45,1.5352-2.3857A9.193,9.193,0,0,0,26,12a9.8739,9.8739,0,0,0-.7764-3.81Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
