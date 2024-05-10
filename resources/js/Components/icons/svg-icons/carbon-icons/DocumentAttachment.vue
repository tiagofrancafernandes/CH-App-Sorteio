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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M26,30H11a2.0023,2.0023,0,0,1-2-2V22h2v6H26V6H17V4h9a2.0023,2.0023,0,0,1,2,2V28A2.0023,2.0023,0,0,1,26,30Z"></path><rect x="17" y="10" width="7" height="2"></rect><rect x="16" y="15" width="8" height="2"></rect><rect x="15" y="20" width="9" height="2"></rect><path d="M9,19a5.0055,5.0055,0,0,1-5-5V3H6V14a3,3,0,0,0,6,0V5a1,1,0,0,0-2,0V15H8V5a3,3,0,0,1,6,0v9A5.0055,5.0055,0,0,1,9,19Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
