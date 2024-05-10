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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>direction--bear-right--02--filled</title><path d="M28,2H4A2,2,0,0,0,2,4V28a2,2,0,0,0,2,2H28a2,2,0,0,0,2-2V4A2,2,0,0,0,28,2ZM6,7.4141,7.4141,6,14,12.5859,12.5859,14ZM26,16H24V9.4141L17.4644,15.95A4.9683,4.9683,0,0,0,16,19.4854V26H14V19.4854a6.954,6.954,0,0,1,2.05-4.95L22.5859,8H16V6H26Z"></path><path id="inner-path" class="cls-1" d="M26,6V16H24V9.4141L17.4644,15.95A4.9683,4.9683,0,0,0,16,19.4854V26H14V19.4854a6.954,6.954,0,0,1,2.05-4.95L22.5859,8H16V6ZM14,12.5859,7.4141,6,6,7.4141,12.5859,14Z" style="fill: none"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
