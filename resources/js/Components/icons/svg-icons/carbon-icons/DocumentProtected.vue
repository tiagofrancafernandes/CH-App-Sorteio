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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,21V18a4,4,0,0,0-8,0v3a2.0025,2.0025,0,0,0-2,2v5a2.0025,2.0025,0,0,0,2,2h8a2.0025,2.0025,0,0,0,2-2V23A2.0025,2.0025,0,0,0,28,21Zm-6-3a2,2,0,0,1,4,0v3H22ZM20,28V23h8v5Z" transform="translate(0 0)"></path><path d="M23.499,9.085,16.707,2.293A1,1,0,0,0,16,2H6A2.0058,2.0058,0,0,0,4,4V28a2.0058,2.0058,0,0,0,2,2h8V28H6V4h8v6a2.0023,2.0023,0,0,0,2,2h6.292a1.7075,1.7075,0,0,0,1.207-2.915ZM16,10V4.4141L21.5854,10Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
