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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>basketball</title><path d="M16,2A14,14,0,1,0,30,16,14.0158,14.0158,0,0,0,16,2ZM27.9492,15H22.041a14.4088,14.4088,0,0,1,2.7383-7.1533A11.9392,11.9392,0,0,1,27.9492,15ZM17,15V4.0508a11.9181,11.9181,0,0,1,6.2874,2.4375A16.2646,16.2646,0,0,0,20.04,15Zm-2,0H11.96A16.2646,16.2646,0,0,0,8.7126,6.4883,11.9181,11.9181,0,0,1,15,4.0508Zm0,2V27.9492a11.9181,11.9181,0,0,1-6.2874-2.4375A16.2646,16.2646,0,0,0,11.96,17Zm2,0h3.04a16.2646,16.2646,0,0,0,3.2476,8.5117A11.9181,11.9181,0,0,1,17,27.9492ZM7.2207,7.8467A14.4088,14.4088,0,0,1,9.959,15H4.0508A11.9392,11.9392,0,0,1,7.2207,7.8467ZM4.0508,17H9.959a14.4088,14.4088,0,0,1-2.7383,7.1533A11.9392,11.9392,0,0,1,4.0508,17Zm20.7285,7.1533A14.4088,14.4088,0,0,1,22.041,17h5.9082A11.9392,11.9392,0,0,1,24.7793,24.1533Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
