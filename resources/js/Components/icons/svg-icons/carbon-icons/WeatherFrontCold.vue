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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28.1655,2a13.0289,13.0289,0,0,0-12.542,9.5791l-1.1767,4.3154A11.0237,11.0237,0,0,1,3.8345,24H2v2H3.8345c.2975,0,.5918-.0171.8853-.0371l7.9291,2.9736A1,1,0,0,0,14,28V21.0923a12.9311,12.9311,0,0,0,.9121-1.313l6.3628-1.8179a1,1,0,0,0,.5059-1.5864L17.7843,11.38a10.9268,10.9268,0,0,1,1.1516-2.3472l5.7477,1.916A1,1,0,0,0,26,10V4.2251A10.8956,10.8956,0,0,1,28.1655,4H30V2ZM8.3354,25.1826A13.047,13.047,0,0,0,12,23.0943v3.4624Zm7.74-7.8154c.1107-.3105.2136-.625.3013-.9463l.732-2.6846L19.28,16.4512ZM24,8.6123l-3.7411-1.247A11.0712,11.0712,0,0,1,24,4.8306Z" transform="translate(0 0)"></path><polygon points="10 4 10 8.586 3.414 2 2 3.414 8.586 10 4 10 4 12 12 12 12 4 10 4"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
