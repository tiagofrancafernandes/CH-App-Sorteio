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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>type-pattern</title><polygon points="30 15 17 15 17 2 15 2 15 15 2 15 2 17 15 17 15 30 17 30 17 17 30 17 30 15"></polygon><polygon points="25.586 20 27 21.414 23.414 25 27 28.586 25.586 30 20.586 25 25.586 20"></polygon><path d="M11,30H3a1,1,0,0,1-.8945-1.4473l4-8a1.0412,1.0412,0,0,1,1.789,0l4,8A1,1,0,0,1,11,30ZM4.6182,28H9.3818L7,23.2363Z"></path><path d="M28,12H22a2.0023,2.0023,0,0,1-2-2V4a2.0023,2.0023,0,0,1,2-2h6a2.0023,2.0023,0,0,1,2,2v6A2.0023,2.0023,0,0,1,28,12ZM22,4v6h6.001L28,4Z"></path><path d="M7,12a5,5,0,1,1,5-5A5.0059,5.0059,0,0,1,7,12ZM7,4a3,3,0,1,0,3,3A3.0033,3.0033,0,0,0,7,4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
