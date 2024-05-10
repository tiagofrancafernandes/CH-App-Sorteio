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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>closed-caption--alt</title><rect x="19" y="17" width="6" height="2"></rect><rect x="11" y="17" width="6" height="2"></rect><rect x="6" y="17" width="3" height="2"></rect><rect x="22" y="13" width="4" height="2"></rect><rect x="13" y="13" width="7" height="2"></rect><rect x="6" y="13" width="5" height="2"></rect><path d="M17.7358,30,16,29l4-7h6a1.9966,1.9966,0,0,0,2-2V8a1.9966,1.9966,0,0,0-2-2H6A1.9966,1.9966,0,0,0,4,8V20a1.9966,1.9966,0,0,0,2,2h9v2H6a3.9993,3.9993,0,0,1-4-4V8A3.9988,3.9988,0,0,1,6,4H26a3.9988,3.9988,0,0,1,4,4V20a3.9993,3.9993,0,0,1-4,4H21.1646Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
