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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>augmented-reality</title><path d="M27.4473,9.1055l-6-3a1.0008,1.0008,0,0,0-.8946,0l-6,3A1,1,0,0,0,14,10v7a1,1,0,0,0,.5527.8945l6,3a1.001,1.001,0,0,0,.8946,0l6-3A1,1,0,0,0,28,17V10A1,1,0,0,0,27.4473,9.1055ZM21,8.1182,24.7637,10,21,11.8818,17.2363,10Zm-5,3.5,4,2v4.7636l-4-2Zm6,6.7636V13.6182l4-2v4.7636Z"></path><circle cx="13.5" cy="24.5" r="1.5"></circle><path d="M20,30H7a2.0023,2.0023,0,0,1-2-2V4A2.0023,2.0023,0,0,1,7,2H20V4H7V28H20V24h2v4A2.0023,2.0023,0,0,1,20,30Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
