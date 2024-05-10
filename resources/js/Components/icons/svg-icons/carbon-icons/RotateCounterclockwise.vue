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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>rotate--counterclockwise</title><path d="M2,28V16a2.0023,2.0023,0,0,1,2-2H16a2.0023,2.0023,0,0,1,2,2V28a2.0023,2.0023,0,0,1-2,2H4A2.0023,2.0023,0,0,1,2,28ZM4,16,3.9988,28H16V16Z" transform="translate(0 0)"></path><path d="M17,2l1.41,1.41L15.83,6H21a7.0078,7.0078,0,0,1,7,7v5H26V13a5.0057,5.0057,0,0,0-5-5H15.83l2.58,2.59L17,12,12,7Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
