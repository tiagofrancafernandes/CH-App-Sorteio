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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="21" y="15" width="2" height="2"></rect><path d="M24,23H20a2.0023,2.0023,0,0,1-2-2V11a2.002,2.002,0,0,1,2-2h4a2.0023,2.0023,0,0,1,2,2V21A2.0027,2.0027,0,0,1,24,23ZM20,11h0V21h4V11Z"></path><rect x="11" y="15" width="2" height="2"></rect><path d="M14,23H10a2.0023,2.0023,0,0,1-2-2V11a2.002,2.002,0,0,1,2-2h4a2.0023,2.0023,0,0,1,2,2V21A2.0027,2.0027,0,0,1,14,23ZM10,11h0V21h4V11Z"></path><rect x="4" y="21" width="2" height="2"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
