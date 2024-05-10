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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>bike-riding</title><path d="M25,30a6,6,0,1,1,6-6A6.0069,6.0069,0,0,1,25,30Zm0-10a4,4,0,1,0,4,4A4.0045,4.0045,0,0,0,25,20Z"></path><path d="M7,30a6,6,0,1,1,6-6A6.0069,6.0069,0,0,1,7,30ZM7,20a4,4,0,1,0,4,4A4.0045,4.0045,0,0,0,7,20Z"></path><path d="M17,27H15V20.4139L9.5849,15a2.003,2.003,0,0,1,0-2.8292l4.5859-4.5859a2.0024,2.0024,0,0,1,2.8286,0L21.414,12H27v1.9993L20.5853,14l-5-5L11,13.5849l6,6Z"></path><path d="M21.5,8A3.5,3.5,0,1,1,25,4.5,3.5042,3.5042,0,0,1,21.5,8Zm0-5A1.5,1.5,0,1,0,23,4.5,1.5017,1.5017,0,0,0,21.5,3Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
