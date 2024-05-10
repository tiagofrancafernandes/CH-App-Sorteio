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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>pedestrian</title><path d="M21.6772,14l-1.2456-3.1143A2.9861,2.9861,0,0,0,17.646,9H13.5542a3.0018,3.0018,0,0,0-1.5439.4277L7,12.4336V18H9V13.5664l3-1.8V23.6973L8.5383,28.8906,10.2024,30,14,24.3027V11h3.646a.9949.9949,0,0,1,.9282.6289L20.3228,16H26V14Z"></path><polygon points="17.051 18.316 19 24.162 19 30 21 30 21 23.838 18.949 17.684 17.051 18.316"></polygon><path d="M16.5,8A3.5,3.5,0,1,1,20,4.5,3.5042,3.5042,0,0,1,16.5,8Zm0-5A1.5,1.5,0,1,0,18,4.5,1.5017,1.5017,0,0,0,16.5,3Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
