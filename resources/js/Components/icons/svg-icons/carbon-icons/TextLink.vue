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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>text-link</title><path d="M18.7061,27.585a5.2615,5.2615,0,0,1-3.7227-8.9834l1.415,1.414a3.2638,3.2638,0,1,0,4.6153,4.6162l6.03-6.03a3.264,3.264,0,0,0-4.6162-4.6158l-1.414-1.414a5.2637,5.2637,0,0,1,7.4443,7.4438l-6.03,6.03A5.2461,5.2461,0,0,1,18.7061,27.585Z"></path><path d="M10.2642,29.9971A5.2619,5.2619,0,0,1,6.542,21.0137l6.03-6.03a5.2636,5.2636,0,1,1,7.4438,7.4438l-1.414-1.414a3.2639,3.2639,0,1,0-4.6158-4.6158l-6.03,6.03a3.264,3.264,0,0,0,4.6157,4.6162l1.414,1.4141A5.2452,5.2452,0,0,1,10.2642,29.9971Z"></path><rect x="2" y="10" width="8" height="2"></rect><rect x="2" y="6" width="12" height="2"></rect><rect x="2" y="2" width="12" height="2"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
