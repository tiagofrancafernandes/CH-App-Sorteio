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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>chart--parallel</title><path d="M28,2V5.3071l-6,2.25V2H20V7.5229l-8-3.2V2H10V4.4458l-6,3.75V2H2V30H4V27.6182l6-3V30h2V24.3442l8,2.4V30h2V26.5542l6-3.75V30h2V2Zm0,5.4429V12.5L22,17V9.6929ZM20,9.6768v7.5571l-8-4.8V6.4771ZM10,6.8042v5.7417l-6,5.25V10.5542ZM4,25.3818V20.4541l6-5.25v7.1777Zm8-3.1259v-7.49l8,4.8v5.0894Zm10,1.94V19.5L28,15v5.4458Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
