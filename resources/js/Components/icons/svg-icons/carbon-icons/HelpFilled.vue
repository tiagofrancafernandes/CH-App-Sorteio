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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>help--filled</title><path d="M16,2A14,14,0,1,0,30,16,14,14,0,0,0,16,2Zm0,23a1.5,1.5,0,1,1,1.5-1.5A1.5,1.5,0,0,1,16,25Zm1.1421-7.754v2.5014h-2.25V15h2.125a2.3763,2.3763,0,0,0,0-4.7526h-1.5a2.3777,2.3777,0,0,0-2.375,2.375V13.26h-2.25v-.6377A4.6279,4.6279,0,0,1,15.5171,8h1.5a4.6238,4.6238,0,0,1,.125,9.246Z" transform="translate(0)"></path><path id="inner-path" class="cls-1" d="M16,25a1.5,1.5,0,1,1,1.5-1.5A1.5,1.5,0,0,1,16,25Zm1.1421-7.754v2.5014h-2.25V15h2.125a2.3763,2.3763,0,0,0,0-4.7526h-1.5a2.3777,2.3777,0,0,0-2.375,2.375V13.26h-2.25v-.6377A4.6279,4.6279,0,0,1,15.5171,8h1.5a4.6238,4.6238,0,0,1,.125,9.246Z" transform="translate(0)" style="fill: none"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
