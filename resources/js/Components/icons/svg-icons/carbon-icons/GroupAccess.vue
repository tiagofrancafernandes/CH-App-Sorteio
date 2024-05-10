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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M8,19H6V17a3.0033,3.0033,0,0,1,3-3h5v2H9a1.0011,1.0011,0,0,0-1,1Z" transform="translate(0 0)"></path><path d="M12,13a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,12,13Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,12,7Z" transform="translate(0 0)"></path><path d="M20,20a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,20,20Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,20,14Z" transform="translate(0 0)"></path><path d="M26,26H24V24a1.0011,1.0011,0,0,0-1-1H17a1.0011,1.0011,0,0,0-1,1v2H14V24a3.0033,3.0033,0,0,1,3-3h6a3.0033,3.0033,0,0,1,3,3Z" transform="translate(0 0)"></path><path d="M8,30H4a2.0021,2.0021,0,0,1-2-2V4A2.0021,2.0021,0,0,1,4,2H8V4H4V28H8Z" transform="translate(0 0)"></path><path d="M28,30H24V28h4V4H24V2h4a2.0021,2.0021,0,0,1,2,2V28A2.0021,2.0021,0,0,1,28,30Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
