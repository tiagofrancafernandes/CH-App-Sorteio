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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>join--left</title><path d="M20,6a9.9272,9.9272,0,0,0-3.9968.8394,9.9758,9.9758,0,0,1,2.2451,1.36,8,8,0,1,1,0,15.6016,9.9758,9.9758,0,0,1-2.2451,1.36A9.9976,9.9976,0,1,0,20,6Z"></path><path d="M12,16a8.01,8.01,0,0,0,6.2483,7.8008,9.9858,9.9858,0,0,0,0-15.6016A8.01,8.01,0,0,0,12,16Z"></path><path id="inner-path" class="cls-1" d="M12,16a8.01,8.01,0,0,1,6.2483-7.8008,9.9758,9.9758,0,0,0-2.2451-1.36,9.9909,9.9909,0,0,0,0,18.3212,9.9758,9.9758,0,0,0,2.2451-1.36A8.01,8.01,0,0,1,12,16Z" style="fill: none"></path><path d="M10,16a10.0105,10.0105,0,0,1,6.0032-9.1606,10,10,0,1,0,0,18.3212A10.0105,10.0105,0,0,1,10,16Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
