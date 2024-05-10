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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>no-ticket</title><path d="M28,6h-.5859L30,3.4141,28.5859,2,2,28.5859,3.4141,30l4-4H28a2.0027,2.0027,0,0,0,2-2V19a1,1,0,0,0-1-1,2,2,0,0,1,0-4,1,1,0,0,0,1-1V8A2.0023,2.0023,0,0,0,28,6Zm0,6.1265a4,4,0,0,0,0,7.7465V24H21V21H19v3H9.4141L19,14.4141V19h2V12.4141L25.4141,8H28Z"></path><path d="M4,12.1265V8H19V6H4A2.0023,2.0023,0,0,0,2,8v5a1,1,0,0,0,1,1,2,2,0,0,1,0,4,1,1,0,0,0-1,1v5H4V19.873a4,4,0,0,0,0-7.7465Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
