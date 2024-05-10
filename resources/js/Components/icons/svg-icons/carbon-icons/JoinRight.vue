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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>join--right</title><path d="M20,6a9.95,9.95,0,0,0-4.0032.8394,9.9909,9.9909,0,0,1,0,18.3212A9.9988,9.9988,0,1,0,20,6Z"></path><path id="inner-path" class="cls-1" d="M20,16a8.01,8.01,0,0,0-6.2483-7.8008,9.9758,9.9758,0,0,1,2.2451-1.36,9.9909,9.9909,0,0,1,0,18.3212,9.9758,9.9758,0,0,1-2.2451-1.36A8.01,8.01,0,0,0,20,16Z" style="fill: none"></path><path d="M10,16a9.9759,9.9759,0,0,0,3.7517,7.8008,7.9937,7.9937,0,0,0,0-15.6016A9.9759,9.9759,0,0,0,10,16Z"></path><path d="M12,24A8,8,0,1,1,13.7517,8.1992a9.9758,9.9758,0,0,1,2.2451-1.36,10,10,0,1,0,0,18.3212,9.9758,9.9758,0,0,1-2.2451-1.36A7.9727,7.9727,0,0,1,12,24Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
