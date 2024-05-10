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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>direction--rotary--straight--filled</title><circle cx="16" cy="19" r="3"></circle><path d="M28,2H4A2,2,0,0,0,2,4V28a2,2,0,0,0,2,2H28a2,2,0,0,0,2-2V4A2,2,0,0,0,28,2ZM21.5859,12.4141,17,7.8281v6.273a5,5,0,0,1,0,9.7978V28H15V23.8989a5,5,0,0,1,0-9.7978V7.8281l-4.5859,4.586L9,11l7-7,7,7Z"></path><path id="inner-path" class="cls-1" d="M21.5859,12.4141,23,11,16,4,9,11l1.4141,1.4141L15,7.8281v6.273a5,5,0,0,0,0,9.7978V28h2V23.8989a5,5,0,0,0,0-9.7978V7.8281ZM19,19a3,3,0,1,1-3-3A3.0033,3.0033,0,0,1,19,19Z" style="fill: none"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
