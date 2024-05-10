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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>fog</title><path d="M24.8008,11.1382a8.9938,8.9938,0,0,0-17.6006,0A6.533,6.533,0,0,0,2,17.5H2V19a1,1,0,0,0,1,1H15a1,1,0,0,0,0-2H4v-.4966H4a4.5176,4.5176,0,0,1,4.144-4.4819l.8155-.064.0991-.812a6.9936,6.9936,0,0,1,13.8838,0l.0986.812.8154.064A4.4962,4.4962,0,0,1,23.5,22H7a1,1,0,0,0,0,2H23.5a6.4963,6.4963,0,0,0,1.3008-12.8618Z"></path><rect x="2" y="26" width="18" height="2" rx="1"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
