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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>smoke</title><path d="M27.001,28a.998.998,0,0,1-.8008-.4l-.8145-1.086a8.9976,8.9976,0,0,1-1.6005-7.2856l1.4736-6.8762a6.9956,6.9956,0,0,0-1.2446-5.6668L23.2,5.6a1,1,0,1,1,1.6-1.2l.8145,1.0857a8.9976,8.9976,0,0,1,1.6005,7.2856l-1.4736,6.8762a6.9956,6.9956,0,0,0,1.2446,5.6668L27.8,26.4A1,1,0,0,1,27.001,28Z"></path><path d="M22.001,28a.998.998,0,0,1-.8008-.4l-.8145-1.086a8.9976,8.9976,0,0,1-1.6005-7.2856l1.4736-6.8762a6.9956,6.9956,0,0,0-1.2446-5.6668L18.2,5.6a1,1,0,1,1,1.6-1.2l.8145,1.0857a8.9976,8.9976,0,0,1,1.6005,7.2856l-1.4736,6.8762a6.9956,6.9956,0,0,0,1.2446,5.6668L22.8,26.4A1,1,0,0,1,22.001,28Z"></path><path d="M17.001,28a.998.998,0,0,1-.8008-.4l-.8145-1.086a8.9976,8.9976,0,0,1-1.6005-7.2856l1.4736-6.8762a6.9956,6.9956,0,0,0-1.2446-5.6668L13.2,5.6a1,1,0,1,1,1.6-1.2l.8145,1.0857a8.9976,8.9976,0,0,1,1.6005,7.2856l-1.4736,6.8762a6.9956,6.9956,0,0,0,1.2446,5.6668L17.8,26.4A1,1,0,0,1,17.001,28Z"></path><path d="M12.001,28a.998.998,0,0,1-.8008-.4l-.8145-1.086a8.9976,8.9976,0,0,1-1.6005-7.2856l1.4736-6.8762A6.9956,6.9956,0,0,0,9.0142,6.6855L8.2,5.6A1,1,0,1,1,9.8,4.4l.8145,1.0857a8.9976,8.9976,0,0,1,1.6005,7.2856l-1.4736,6.8762a6.9956,6.9956,0,0,0,1.2446,5.6668L12.8,26.4A1,1,0,0,1,12.001,28Z"></path><path d="M7.001,28A.998.998,0,0,1,6.2,27.6l-.8145-1.086a8.9976,8.9976,0,0,1-1.6-7.2856l1.4736-6.8762A6.9956,6.9956,0,0,0,4.0142,6.6855L3.2,5.6A1,1,0,1,1,4.8,4.4l.8145,1.0857a8.9976,8.9976,0,0,1,1.6005,7.2856L5.7412,19.6474a6.9956,6.9956,0,0,0,1.2446,5.6668L7.8,26.4A1,1,0,0,1,7.001,28Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
