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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>flow--data</title><path class="cls-1" d="M20,23H11.86a4.17,4.17,0,0,0-.43-1L22,11.43A3.86,3.86,0,0,0,24,12a4,4,0,1,0-3.86-5H11.86a4,4,0,1,0,0,2h8.28a4.17,4.17,0,0,0,.43,1L10,20.57A3.86,3.86,0,0,0,8,20a4,4,0,1,0,3.86,5H20v3h8V20H20ZM8,10a2,2,0,1,1,2-2A2,2,0,0,1,8,10ZM24,6a2,2,0,1,1-2,2A2,2,0,0,1,24,6ZM8,26a2,2,0,1,1,2-2A2,2,0,0,1,8,26Zm14-4h4v4H22Z" style="fill:currentColor"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill:none"></rect></svg>

</template>
