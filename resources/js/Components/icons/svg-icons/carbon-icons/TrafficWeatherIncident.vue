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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="2" y="24" width="2" height="6"></rect><rect x="28" y="2" width="2" height="28"></rect><rect x="15" y="2" width="2" height="4"></rect><rect x="15" y="10" width="2" height="4"></rect><rect x="15" y="18" width="2" height="4"></rect><rect x="15" y="26" width="2" height="4"></rect><path d="M6,12A3.8978,3.8978,0,0,1,2,8.223a3.9017,3.9017,0,0,1,.6533-2.0639L5.17,2.4141a1.0381,1.0381,0,0,1,1.6592,0L9.3154,6.11A3.9693,3.9693,0,0,1,10,8.223,3.8978,3.8978,0,0,1,6,12Zm0-7.2368L4.3438,7.2257A1.89,1.89,0,0,0,4,8.223a1.9007,1.9007,0,0,0,2,1.7775A1.9007,1.9007,0,0,0,8,8.223a1.98,1.98,0,0,0-.375-1.0466Z" transform="translate(0 0)"></path><path d="M11,11.7627,9.3438,14.2253A1.89,1.89,0,0,0,9,15.2226,1.9007,1.9007,0,0,0,11,17a1.9007,1.9007,0,0,0,2-1.7774,1.98,1.98,0,0,0-.375-1.0467Z" transform="translate(0 0)"></path><path d="M6,15.7627,4.3438,18.2253A1.89,1.89,0,0,0,4,19.2226,1.9007,1.9007,0,0,0,6,21a1.9007,1.9007,0,0,0,2-1.7774,1.98,1.98,0,0,0-.375-1.0467Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
