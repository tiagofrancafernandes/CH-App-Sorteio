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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m28,2h-10c-1.1035,0-2,.8965-2,2v6c0,1.1035.8965,2,2,2h2.4229s1.7314,3,1.7314,3l1.7324-1-2.3096-4h-3.5771V4h10v6h-3s0,2,0,2h3c1.1035,0,2-.8965,2-2V4c0-1.1035-.8965-2-2-2Z"></path><path d="m14.6904,31l-1.7324-1,3.4648-6h5.5771c1.1046,0,2-.8954,2-2v-5h2v5c0,2.2091-1.7909,4-4,4h-4.4229l-2.8867,5Z"></path><circle cx="10" cy="17" r="1"></circle><circle cx="14" cy="17" r="1"></circle><circle cx="18" cy="17" r="1"></circle><path d="m12,26h-6c-2.2091,0-4-1.7909-4-4v-10c0-2.2091,1.7909-4,4-4h8v2H6c-1.1046,0-2,.8954-2,2v10c0,1.1046.8954,2,2,2h6v2Z"></path><g id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;"><rect class="cls-1" width="32" height="32" style="fill: none"></rect></g></svg>

</template>
