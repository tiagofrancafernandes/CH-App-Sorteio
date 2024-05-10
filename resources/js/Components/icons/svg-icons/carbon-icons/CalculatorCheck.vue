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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>calculator--check</title><polygon points="24 26.59 21.41 24 20 25.41 24 29.41 31 22.41 29.59 21 24 26.59"></polygon><rect x="15" y="23" width="2" height="2"></rect><rect x="9" y="23" width="2" height="2"></rect><rect x="21" y="18" width="2" height="2"></rect><rect x="15" y="18" width="2" height="2"></rect><rect x="9" y="18" width="2" height="2"></rect><rect x="21" y="13" width="2" height="2"></rect><rect x="15" y="13" width="2" height="2"></rect><rect x="9" y="13" width="2" height="2"></rect><rect x="9" y="7" width="14" height="3"></rect><path d="M17,30H6.0046A2.007,2.007,0,0,1,4,27.9951V3.9961A1.9984,1.9984,0,0,1,5.9961,2H26.0037A1.9985,1.9985,0,0,1,28,3.9961V18H26V4H6V28H17Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
