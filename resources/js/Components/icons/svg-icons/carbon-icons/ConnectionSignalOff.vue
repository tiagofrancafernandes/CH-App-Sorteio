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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M26,13a8.9089,8.9089,0,0,1-2.5249,6.2339l1.4133,1.4131A10.9795,10.9795,0,0,0,23.6006,4.2l-1.2012,1.6A8.932,8.932,0,0,1,26,13Z"></path><path d="M21,13a5.0022,5.0022,0,0,1-.9023,2.8564l1.4277,1.4278a6.9831,6.9831,0,0,0-.8584-9.5015l-1.334,1.49A5.0077,5.0077,0,0,1,21,13Z"></path><path d="M30,28.5859,3.4143,2,2,3.4141l3.71,3.71A10.9824,10.9824,0,0,0,8.3994,21.8008l1.2012-1.6A8.9678,8.9678,0,0,1,7.1714,8.5854l2.1963,2.1963a6.9664,6.9664,0,0,0,1.9648,7.4351l1.334-1.49A5.0072,5.0072,0,0,1,11,13a4.8854,4.8854,0,0,1,.0393-.5464L15,16.4141V30h2V18.4141L28.5857,30Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
