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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>wheat</title><path d="M21,3V5.5857l-4,4V1H15V9.5857l-4-4V3H9V19a7.004,7.004,0,0,0,6,6.92V30h2V25.92A7.004,7.004,0,0,0,23,19V3ZM15,23.8987A5.008,5.008,0,0,1,11,19v-2.586l4,4Zm0-6.313-4-4V8.4138l4,4Zm2-5.1719,4-4v5.1719l-4,4Zm0,11.4849V20.4138l4-4V19A5.008,5.008,0,0,1,17,23.8987Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
