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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>direction--rotary--right--filled</title><circle cx="11" cy="11" r="3"></circle><path d="M28,2H4A2,2,0,0,0,2,4V28a2,2,0,0,0,2,2H28a2,2,0,0,0,2-2V4A2,2,0,0,0,28,2ZM20,18l-1.4141-1.4141L23.1719,12h-7.273A5.0145,5.0145,0,0,1,12,15.8989V26H10V15.8989A5,5,0,1,1,15.8989,10h7.273l-4.586-4.5859L20,4l7,7Z"></path><path id="inner-path" class="cls-1" d="M20,4,18.5859,5.4141,23.1719,10h-7.273A5,5,0,1,0,10,15.8989V26h2V15.8989A5.0145,5.0145,0,0,0,15.8989,12h7.273l-4.586,4.5859L20,18l7-7ZM11,14a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,11,14Z" style="fill: none"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
