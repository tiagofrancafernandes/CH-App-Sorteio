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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>dew-point</title><path d="M24,10a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,24,10Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,24,4Z"></path><path d="M14.5,30A5.4962,5.4962,0,0,1,9,24.52c0-3.4426,4.3442-21.0141,4.5293-21.76a1,1,0,0,1,1.9414,0C15.6558,3.5059,20,21.0774,20,24.52A5.4962,5.4962,0,0,1,14.5,30Zm0-22.7561C13.0391,13.38,11,22.4089,11,24.52a3.5,3.5,0,0,0,7,0C18,22.4089,15.9609,13.38,14.5,7.2439Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
