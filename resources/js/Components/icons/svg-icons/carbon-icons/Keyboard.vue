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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>keyboard</title><path d="M28,26H4a2,2,0,0,1-2-2V10A2,2,0,0,1,4,8H28a2,2,0,0,1,2,2V24A2,2,0,0,1,28,26ZM4,10V24H28V10Z"></path><rect x="10" y="20" width="11" height="2"></rect><rect x="6" y="12" width="2" height="2"></rect><rect x="10" y="12" width="2" height="2"></rect><rect x="14" y="12" width="2" height="2"></rect><rect x="18" y="12" width="2" height="2"></rect><rect x="6" y="20" width="2" height="2"></rect><rect x="6" y="16" width="2" height="2"></rect><rect x="10" y="16" width="2" height="2"></rect><rect x="14" y="16" width="2" height="2"></rect><rect x="22" y="12" width="4" height="2"></rect><rect x="22" y="16" width="4" height="2"></rect><rect x="18" y="16" width="2" height="2"></rect><rect x="23" y="20" width="3" height="2"></rect><rect id="_Transparent_Rectangle_" data-name=" Transparent Rectangle " class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
