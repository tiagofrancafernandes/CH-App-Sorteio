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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>user--favorite--alt--filled</title><path d="M26.4938,3a3.4735,3.4735,0,0,0-2.48,1.0393l-.5111.5228-.5161-.5228a3.4792,3.4792,0,0,0-4.96,0,3.59,3.59,0,0,0,0,5.0251l5.4766,5.5427,5.4716-5.5427a3.59,3.59,0,0,0,0-5.0251A3.4738,3.4738,0,0,0,26.4938,3Z" transform="translate(0 0)"></path><path d="M16,30H14V25a3.0033,3.0033,0,0,0-3-3H7a3.0033,3.0033,0,0,0-3,3v5H2V25a5.0059,5.0059,0,0,1,5-5h4a5.0059,5.0059,0,0,1,5,5Z" transform="translate(0 0)"></path><path d="M9,10a3,3,0,1,1-3,3,3,3,0,0,1,3-3M9,8a5,5,0,1,0,5,5A5,5,0,0,0,9,8Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
