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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>heat-map--02</title><circle cx="21" cy="20" r="2"></circle><circle cx="14" cy="12" r="2"></circle><circle cx="29" cy="19" r="1"></circle><path d="M26.5,30A3.5,3.5,0,1,1,30,26.5,3.5041,3.5041,0,0,1,26.5,30Zm0-5A1.5,1.5,0,1,0,28,26.5,1.5017,1.5017,0,0,0,26.5,25Z"></path><path d="M14,30a3.958,3.958,0,0,1-2.126-.6211,6.9977,6.9977,0,1,1,4.1109-6.8384A3.9916,3.9916,0,0,1,14,30Zm-1.8843-3.0278.5391.4946a1.9915,1.9915,0,1,0,2.0039-3.343l-.6909-.2432.03-.8467a5.0085,5.0085,0,1,0-2.5166,4.3023Z"></path><path d="M24,16a6.0067,6.0067,0,0,1-6-6,5.3246,5.3246,0,0,1,.0269-.5327A3.9564,3.9564,0,0,1,16,6a4.0045,4.0045,0,0,1,4-4,3.9564,3.9564,0,0,1,3.4673,2.0271C23.6484,4.009,23.8252,4,24,4a6,6,0,0,1,0,12ZM20,4a2.0021,2.0021,0,0,0-2,2,1.9805,1.9805,0,0,0,1.43,1.9023l.9018.2706-.2153.9162A3.9938,3.9938,0,1,0,24,6a4.0064,4.0064,0,0,0-.9121.1162l-.9155.2141-.27-.9006A1.9807,1.9807,0,0,0,20,4Z"></path><path d="M6.5,11A4.5,4.5,0,1,1,11,6.5,4.5051,4.5051,0,0,1,6.5,11Zm0-7A2.5,2.5,0,1,0,9,6.5,2.503,2.503,0,0,0,6.5,4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
