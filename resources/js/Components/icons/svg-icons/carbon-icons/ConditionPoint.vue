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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="10.3431" y="10.3431" width="11.3137" height="11.3137" transform="translate(-6.6274 16) rotate(-45)"></rect><path d="M29.3906,14.5269,17.4731,2.6094a2.0852,2.0852,0,0,0-2.9462,0L2.6094,14.5269a2.0852,2.0852,0,0,0,0,2.9462L14.5269,29.3906a2.0852,2.0852,0,0,0,2.9462,0L29.3906,17.4731a2.0852,2.0852,0,0,0,0-2.9462ZM16,28.0356,3.9646,16,16,3.9644,28.0356,16Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
