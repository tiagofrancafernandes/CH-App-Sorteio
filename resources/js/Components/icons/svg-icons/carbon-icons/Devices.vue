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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>devices</title><path d="M10,30H4a2,2,0,0,1-2-2V16a2,2,0,0,1,2-2h6a2,2,0,0,1,2,2V28A2,2,0,0,1,10,30ZM4,16V28h6V16Z"></path><path class="cls-1" d="M28,4H6A2,2,0,0,0,4,6v6H6V6H28V20H14v2h2v4H14v2h9V26H18V22H28a2,2,0,0,0,2-2V6A2,2,0,0,0,28,4Z" style="fill:currentColor"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill:none"></rect></svg>

</template>
