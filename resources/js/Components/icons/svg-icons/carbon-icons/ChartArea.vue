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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>chart--area</title><path d="M20.4761,8.0151,13.4473,4.2109a2.0076,2.0076,0,0,0-2.1158.2051L4,10.001V2H2V28a2,2,0,0,0,2,2H30V5.7354ZM28,20.209l-7.62,1.8022-7.0288-2.8838a1.99,1.99,0,0,0-2.022.37L4,25.8359v-4.455l8.375-9.4,7.0186,5.62a2.0155,2.0155,0,0,0,2.0459.2119L28,14.6025ZM12.5239,5.9849l7.03,3.8042a2.012,2.012,0,0,0,1.3408.16L28,8.2646v4.1138L20.6187,16.02,13.6,10.4a1.99,1.99,0,0,0-2.6885.2642L4,18.3838v-5.87ZM4.5513,28,12.62,20.9888l7.0288,2.8838a1.9977,1.9977,0,0,0,1.147.0771L28,22.2612V28Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
