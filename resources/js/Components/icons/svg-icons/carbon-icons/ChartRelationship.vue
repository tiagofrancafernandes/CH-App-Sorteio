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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>chart--relationship</title><path d="M26,6a3.9963,3.9963,0,0,0-3.8579,3H17.9305A7.9964,7.9964,0,1,0,9,17.9307v4.2114a4,4,0,1,0,2,0V17.9307a7.951,7.951,0,0,0,3.8976-1.6192l3.6693,3.67A3.9529,3.9529,0,0,0,18,22a4,4,0,1,0,4-4,3.9521,3.9521,0,0,0-2.019.5669l-3.6694-3.6694A7.9493,7.9493,0,0,0,17.9305,11h4.2116A3.9934,3.9934,0,1,0,26,6ZM12,26a2,2,0,1,1-2-2A2.0023,2.0023,0,0,1,12,26ZM10,16a6,6,0,1,1,6-6A6.0066,6.0066,0,0,1,10,16Zm14,6a2,2,0,1,1-2-2A2.0023,2.0023,0,0,1,24,22Zm2-10a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,26,12Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
