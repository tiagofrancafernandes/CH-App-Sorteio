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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>document--unknown</title><circle cx="8.9999" cy="28.5" r="1.5"></circle><path d="M10,25H8V21h2a2,2,0,0,0,0-4H8a2.0023,2.0023,0,0,0-2,2v.5H4V19a4.0045,4.0045,0,0,1,4-4h2a4,4,0,0,1,0,8Z"></path><path d="M27.7,9.3l-7-7A.9085.9085,0,0,0,20,2H10A2.0058,2.0058,0,0,0,8,4v8h2V4h8v6a2.0058,2.0058,0,0,0,2,2h6V28H14v2H26a2.0058,2.0058,0,0,0,2-2V10A.9092.9092,0,0,0,27.7,9.3ZM20,10V4.4L25.6,10Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
