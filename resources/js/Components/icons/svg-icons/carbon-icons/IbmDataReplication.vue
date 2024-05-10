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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M20,20v2h5.22a11.0163,11.0163,0,0,1-11.97,4.6533l-.4986,1.937A13,13,0,0,0,26,24.293V28h2V20Z"></path><path d="M25,3a4.0045,4.0045,0,0,0-4,4,3.954,3.954,0,0,0,.5669,2.019L9.019,21.5669A3.9521,3.9521,0,0,0,7,21a4,4,0,1,0,4,4,3.954,3.954,0,0,0-.5669-2.019L22.981,10.4331A3.9518,3.9518,0,0,0,25,11a4,4,0,0,0,0-8ZM7,27a2,2,0,1,1,2-2A2.002,2.002,0,0,1,7,27ZM25,9a2,2,0,1,1,2-2A2.002,2.002,0,0,1,25,9Z"></path><path d="M16,3A13.04,13.04,0,0,0,6,7.707V4H4v8h8V10H6.78a11.0163,11.0163,0,0,1,11.97-4.6533l.4986-1.937A13.0358,13.0358,0,0,0,16,3Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
