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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m26,14c1.1028,0,2,.8972,2,2s-.8972,2-2,2-2-.8972-2-2,.8972-2,2-2m0-2c-2.2091,0-4,1.7909-4,4s1.7909,4,4,4,4-1.7909,4-4-1.7909-4-4-4h0Z"></path><path d="m15,11l-1.4143,1.4141,2.5859,2.5859H7.8157c-.4141-1.1611-1.5137-2-2.8157-2-1.6543,0-3,1.3457-3,3s1.3457,3,3,3c1.302,0,2.4016-.8389,2.8157-2h8.356l-2.5859,2.5859,1.4143,1.4141,5-5-5-5Zm-10,6c-.5515,0-1-.4487-1-1s.4485-1,1-1,1,.4487,1,1-.4485,1-1,1Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
