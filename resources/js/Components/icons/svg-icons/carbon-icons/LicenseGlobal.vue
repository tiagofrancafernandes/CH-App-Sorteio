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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M22,14a8,8,0,1,0,8,8A8.0092,8.0092,0,0,0,22,14Zm5.91,7H25.9563a12.03,12.03,0,0,0-1.2183-4.3325A6.01,6.01,0,0,1,27.91,21Zm-7.8545,0A10.0135,10.0135,0,0,1,22,16.0146,10.0121,10.0121,0,0,1,23.9448,21Zm3.89,2A10.01,10.01,0,0,1,22,27.9854,10.0121,10.0121,0,0,1,20.0552,23Zm-4.6831-6.332A12.0265,12.0265,0,0,0,18.0435,21H16.09A6.01,6.01,0,0,1,19.2617,16.668ZM16.09,23h1.9532a12.0265,12.0265,0,0,0,1.2182,4.332A6.01,6.01,0,0,1,16.09,23Zm8.6482,4.332A12.0242,12.0242,0,0,0,25.9565,23H27.91A6.0088,6.0088,0,0,1,24.7385,27.332Z" transform="translate(0 0)"></path><rect x="6" y="14" width="6" height="2"></rect><rect x="6" y="6" width="12" height="2"></rect><rect x="6" y="10" width="12" height="2"></rect><rect x="6" y="24" width="6" height="2"></rect><path d="M12,30H4a2.0021,2.0021,0,0,1-2-2V4A2.0021,2.0021,0,0,1,4,2H20a2.0021,2.0021,0,0,1,2,2v8H20V4H4V28h8Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
