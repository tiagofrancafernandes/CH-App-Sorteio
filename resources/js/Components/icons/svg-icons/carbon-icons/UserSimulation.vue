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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>user--simulation</title><rect x="25.2321" y="12.866" width="4" height="2" transform="translate(10.5814 -11.7583) rotate(30)"></rect><rect x="26" y="8" width="4" height="2"></rect><rect x="2.7679" y="12.866" width="4" height="2" transform="translate(15.8301 23.4904) rotate(150)"></rect><path d="M26,30H24V25a5.0059,5.0059,0,0,0-5-5H13a5.0059,5.0059,0,0,0-5,5v5H6V25a7.0082,7.0082,0,0,1,7-7h6a7.0082,7.0082,0,0,1,7,7Z"></path><path d="M16,4a5,5,0,1,1-5,5,5,5,0,0,1,5-5m0-2a7,7,0,1,0,7,7A7,7,0,0,0,16,2Z"></path><rect x="25.2321" y="3.134" width="4" height="2" transform="translate(1.5814 14.1699) rotate(-30)"></rect><rect x="2" y="8" width="4" height="2"></rect><rect x="2.7679" y="3.134" width="4" height="2" transform="translate(6.8301 10.0981) rotate(-150)"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
