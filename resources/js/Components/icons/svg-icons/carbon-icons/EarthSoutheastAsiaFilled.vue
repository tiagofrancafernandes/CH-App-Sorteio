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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>earth--southeast-asia--filled</title><rect x="17" y="22" width="2" height="2"></rect><rect x="17" y="18" width="2" height="2"></rect><rect x="14" y="24" width="3" height="2"></rect><path d="M16,2A14,14,0,1,0,30,16,14.0158,14.0158,0,0,0,16,2ZM4.7,20H6l4.1772,2.6a1,1,0,0,0,1.36-.2939l1.0078-1.5118a1,1,0,0,0-.125-1.2617L10,17.1118,11,14h5.323a1,1,0,0,0,.9285-.6284L18.8333,9.417a1,1,0,0,0-.034-.8189L16.5129,4.0259A11.9652,11.9652,0,0,1,26.3762,22H23a1,1,0,0,0-1,1v3.3765A11.9578,11.9578,0,0,1,4.7,20Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
