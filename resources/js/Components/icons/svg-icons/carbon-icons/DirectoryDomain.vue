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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,26H18.8157A2.9959,2.9959,0,0,0,17,24.1841V19h7a2.0025,2.0025,0,0,0,2-2V4a2.0025,2.0025,0,0,0-2-2H8A2.0025,2.0025,0,0,0,6,4V17a2.0025,2.0025,0,0,0,2,2h7v5.1841A2.9959,2.9959,0,0,0,13.1843,26H4v2h9.1843a2.982,2.982,0,0,0,5.6314,0H28ZM24,12H8V9H24Zm0-8V7H8V4ZM8,14H24v3H8Zm8,14a1,1,0,1,1,1-1A1.0008,1.0008,0,0,1,16,28Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
