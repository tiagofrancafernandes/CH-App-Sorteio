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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M27,3h-8c-1.1028,0-2,.8975-2,2V27c0,1.1025,.8972,2,2,2h8c1.1028,0,2-.8975,2-2V5c0-1.1025-.8972-2-2-2Zm.0002,6.9194l-6.1494-4.9194h6.1492l.0002,4.9194Zm-.6011,2.0806l-7.3992,5.9194V6.0806l7.3992,5.9194Zm.6013,2.0801l.0007,11.8403-7.4004-5.9204,7.3997-5.9199Zm-8.0005,8.0005l6.1492,4.9194h-6.1492v-4.9194Z"></path><path d="M13,3H5c-1.1028,0-2,.8975-2,2V27c0,1.1025,.8972,2,2,2H13c1.1028,0,2-.8975,2-2V5c0-1.1025-.8972-2-2-2Zm.0002,6.9194L6.8508,5h6.1492l.0002,4.9194Zm-.6011,2.0806l-7.3992,5.9194V6.0806l7.3992,5.9194Zm.6013,2.0801l.0007,11.8403-7.4004-5.9204,7.3997-5.9199ZM5,22.0806l6.1492,4.9194H5v-4.9194Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
