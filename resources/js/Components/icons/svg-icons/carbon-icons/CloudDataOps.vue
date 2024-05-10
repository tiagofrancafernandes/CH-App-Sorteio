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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="28" y="18" width="2" height="10"></rect><rect x="24" y="14" width="2" height="14"></rect><rect x="20" y="22" width="2" height="6"></rect><path d="M22.175,10,23.76,8.7339A9.9522,9.9522,0,0,0,17.89,5.1816,10.0025,10.0025,0,0,0,6.17,13.1152,7.5054,7.5054,0,0,0,.0544,21.4087,7.6843,7.6843,0,0,0,7.7692,28H16V26H7.6945a5.632,5.632,0,0,1-5.6023-4.4858,5.5064,5.5064,0,0,1,4.4339-6.4307l1.3486-.2441.2139-1.11a8.206,8.206,0,0,1,6.7426-6.6426,7.9666,7.9666,0,0,1,3.0137.13A7.8037,7.8037,0,0,1,22.175,10Z" transform="translate(0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
