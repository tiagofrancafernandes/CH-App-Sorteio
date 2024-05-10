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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M30,23H24a2.0023,2.0023,0,0,1-2-2V11a2.002,2.002,0,0,1,2-2h6v2H24V21h6Z"></path><path d="M20,12a3.0033,3.0033,0,0,0-3-3H12V23h5a3.0033,3.0033,0,0,0,3-3V18a2.977,2.977,0,0,0-.78-2A2.9768,2.9768,0,0,0,20,14Zm-6-1h3a1.0013,1.0013,0,0,1,1,1v2a1.0013,1.0013,0,0,1-1,1H14Zm4,9a1.0009,1.0009,0,0,1-1,1H14V17h3a1.0009,1.0009,0,0,1,1,1Z"></path><path d="M8,9H4a2.002,2.002,0,0,0-2,2V23H4V18H8v5h2V11A2.002,2.002,0,0,0,8,9ZM4,16V11H8v5Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
