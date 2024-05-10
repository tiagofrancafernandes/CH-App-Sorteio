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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>chart--radar</title><path d="M16,2,2,13,8,30H24l6-17Zm2.5818,19.2651-5.9861,1.3306-1.4226-7.8252,4.91-4.209,5.4416,4.0816Zm.1977,2.0054L21.3264,28H10.6736l1.7912-3.3267ZM9.59,13.4937,5.74,12.605,15,5.3291V8.8569ZM17,8.75V5.3291l9.26,7.2759-3.15.727ZM4.6143,14.3979l4.6535,1.0738,1.4844,8.164-1.738,3.2281ZM22.9858,26.8638l-2.5766-4.7852,3.0063-6.7646,3.97-.9161Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
