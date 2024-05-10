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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="22" y="15" width="10" height="2"></rect><path d="M18,30a.997.997,0,0,1-.7109-.2969L9.666,22H3a.9993.9993,0,0,1-1-.9988V11a.9993.9993,0,0,1,.9988-1H9.666l7.623-7.7031A1,1,0,0,1,19,3V29A1.0007,1.0007,0,0,1,18,30ZM4,20h6a1.2008,1.2008,0,0,1,.7939.2969L17,26.5684V5.4316l-6.2061,6.2715A1.2013,1.2013,0,0,1,10,12H4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
