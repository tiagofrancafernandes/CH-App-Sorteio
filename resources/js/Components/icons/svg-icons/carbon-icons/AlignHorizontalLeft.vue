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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>align--horizontal-left</title><path d="M26,26H11a2.0023,2.0023,0,0,1-2-2V20a2.0023,2.0023,0,0,1,2-2H26a2.0023,2.0023,0,0,1,2,2v4A2.0023,2.0023,0,0,1,26,26Zm0-6.0012L11,20v4H26Z"></path><path d="M18,14H11a2.0023,2.0023,0,0,1-2-2V8a2.0023,2.0023,0,0,1,2-2h7a2.0023,2.0023,0,0,1,2,2v4A2.0023,2.0023,0,0,1,18,14Zm0-6.0012L11,8v4h7Z"></path><rect x="4" y="2" width="2" height="28"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
