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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>arrival</title><rect x="2" y="28" width="28" height="2"></rect><path d="M17.21,5.23l1.39.38,1,11.29,5.87,1.57A2,2,0,0,1,27,20.62a1.88,1.88,0,0,1-1.37,1.52,2,2,0,0,1-1,0l-18.7-5a1.89,1.89,0,0,1-1.33-2.3L6.35,8.34l1.44.38L8.4,13.9l6,1.62L17.21,5.23m-1-2.2a1,1,0,0,0-.68.69L13,13.07l-2.81-.75L9.69,7.79A1,1,0,0,0,9,7L5.87,6.14a.94.94,0,0,0-.5,0,1,1,0,0,0-.68.68l-2,7.49a3.87,3.87,0,0,0,2.74,4.74l18.71,5A3.87,3.87,0,0,0,29,21a4,4,0,0,0-3-4.42l-4.52-1.21L20.53,4.71a1,1,0,0,0-.72-.85L16.73,3a1.06,1.06,0,0,0-.5,0Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
