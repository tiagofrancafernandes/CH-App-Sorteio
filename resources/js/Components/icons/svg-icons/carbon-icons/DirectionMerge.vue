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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>direction--merge</title><path d="M17.8784,15.4648A2.9821,2.9821,0,0,1,17,13.3433V7.8281l4.5859,4.586L23,11,16,4,9,11l1.4141,1.4141L15,7.8281v5.5152a2.9805,2.9805,0,0,1-.8784,2.1211l-2.6572,2.6567A4.9682,4.9682,0,0,0,10,21.6567V28h2V21.6567a2.9805,2.9805,0,0,1,.8784-2.1211l2.6572-2.6567A5.0021,5.0021,0,0,0,16,16.3135a5.0021,5.0021,0,0,0,.4644.5654l2.6572,2.6563A2.9821,2.9821,0,0,1,20,21.6567V28h2V21.6567a4.9682,4.9682,0,0,0-1.4644-3.5356Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
