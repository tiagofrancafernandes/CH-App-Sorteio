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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>view--off--filled</title><path d="M30.94,15.66a16.4,16.4,0,0,0-5.73-7.45L30,3.41,28.59,2,2,28.59,3.41,30l5.1-5.09A15.38,15.38,0,0,0,16,27,16.69,16.69,0,0,0,30.94,16.34,1,1,0,0,0,30.94,15.66ZM16,22.5a6.46,6.46,0,0,1-3.83-1.26L14,19.43A4,4,0,0,0,19.43,14l1.81-1.81A6.49,6.49,0,0,1,16,22.5Z"></path><path d="M4.53,21.81l5-5A6.84,6.84,0,0,1,9.5,16,6.51,6.51,0,0,1,16,9.5a6.84,6.84,0,0,1,.79.05l3.78-3.77A14.39,14.39,0,0,0,16,5,16.69,16.69,0,0,0,1.06,15.66a1,1,0,0,0,0,.68A15.86,15.86,0,0,0,4.53,21.81Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
