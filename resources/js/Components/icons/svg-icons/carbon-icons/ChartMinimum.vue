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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M4,28V26H6V24H4V2H2V28a2,2,0,0,0,2,2H30V28Z"></path><rect x="8" y="24" width="2" height="2"></rect><rect x="12" y="24" width="2" height="2"></rect><rect x="20" y="24" width="2" height="2"></rect><rect x="24" y="24" width="2" height="2"></rect><rect x="28" y="24" width="2" height="2"></rect><path d="M27.9463,4.3281,25.9727,4C23.9487,16.1084,21.0137,22,17,22S10.0513,16.1084,8.0271,4l-1.9734.3281C7.51,13.0566,9.9631,22.93,16,23.9131V26h2V23.9131C24.0371,22.93,26.4907,13.0566,27.9463,4.3281Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
