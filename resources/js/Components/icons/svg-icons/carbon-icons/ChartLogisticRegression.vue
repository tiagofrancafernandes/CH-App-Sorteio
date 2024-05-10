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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="26" cy="22" r="2"></circle><circle cx="20" cy="22" r="2"></circle><circle cx="14" cy="6" r="2"></circle><circle cx="8" cy="6" r="2"></circle><path d="m8.2339,24c3.8799,0,7.311-2.4731,8.5383-6.1543l2.353-7.0591c.9543-2.8628,3.6233-4.7866,6.6409-4.7866h4.2339v-2h-4.2339c-3.8799,0-7.311,2.4731-8.5383,6.1543l-2.353,7.0591c-.9543,2.8628-3.6233,4.7866-6.6409,4.7866h-4.2339V2h-2v26c0,1.1025.897,2,2,2h26v-2H4v-4h4.2339Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
