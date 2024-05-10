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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M23,24a2.98,2.98,0,0,0-2.0376.8115l-4.0037-2.4023a2.0478,2.0478,0,0,0,0-.8184l4.0037-2.4023a3.2463,3.2463,0,1,0-.9211-1.7793l-4.0037,2.4023a3,3,0,1,0,0,4.377l4.0037,2.4023A2.9729,2.9729,0,0,0,20,27a3,3,0,1,0,3-3Zm0-8a1,1,0,1,1-1,1A1.0008,1.0008,0,0,1,23,16Zm-9,7a1,1,0,1,1,1-1A1.0008,1.0008,0,0,1,14,23Zm9,5a1,1,0,1,1,1-1A1.0008,1.0008,0,0,1,23,28Z"></path><path d="M8,28H4a2.0023,2.0023,0,0,1-2-2V6A2.0023,2.0023,0,0,1,4,4h7.5857A1.9865,1.9865,0,0,1,13,4.5859L16.4143,8H28a2.0023,2.0023,0,0,1,2,2v8H28V10H15.5857l-4-4H4V26H8Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
