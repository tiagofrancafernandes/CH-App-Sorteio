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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>direction--rotary--first-right--filled</title><circle cx="11" cy="11" r="3"></circle><path d="M28,2H4A2,2,0,0,0,2,4V28a2,2,0,0,0,2,2H28a2,2,0,0,0,2-2V4A2,2,0,0,0,28,2ZM26,26H16V24h6.5859l-8.833-8.833A4.9678,4.9678,0,0,1,12,15.8989V26H10V15.8989a5.0113,5.0113,0,1,1,5.167-2.146L24,22.5859V16h2Z"></path><path id="inner-path" class="cls-1" d="M11,14a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,11,14Zm13,2v6.5859l-8.833-8.833A4.9959,4.9959,0,1,0,10,15.8989V26h2V15.8989a4.9678,4.9678,0,0,0,1.7529-.7319L22.5859,24H16v2H26V16Z" style="fill: none"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
