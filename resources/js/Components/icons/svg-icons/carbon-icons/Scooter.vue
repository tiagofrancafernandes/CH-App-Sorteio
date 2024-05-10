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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>scooter</title><path d="M26,28a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,26,28Zm0-6a2,2,0,1,0,2,2A2.0023,2.0023,0,0,0,26,22Z"></path><path d="M24,8H18v2h6a1,1,0,0,1,0,2H21a1,1,0,0,0-.98,1.1963l.9241,4.6211L18.4338,22h-2.69l-2.5723-8.5752A1.988,1.988,0,0,0,11.2559,12H6v2h5.2561l.6,2H7a5.0057,5.0057,0,0,0-5,5v2a1,1,0,0,0,1,1H4a4,4,0,0,0,8,0h7a1,1,0,0,0,.8574-.4854l3-5a1,1,0,0,0,.1231-.7109L22.22,14H24a3,3,0,0,0,0-6ZM8,26a2.0025,2.0025,0,0,1-2-2h4A2.0025,2.0025,0,0,1,8,26ZM4,22V21a3.0033,3.0033,0,0,1,3-3h5.4561l1.2,4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
