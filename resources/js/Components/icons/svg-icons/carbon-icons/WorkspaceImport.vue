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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M27,6v5H17V6H27m0-2H17a2,2,0,0,0-2,2v5a2,2,0,0,0,2,2H27a2,2,0,0,0,2-2V6a2,2,0,0,0-2-2Z"></path><path d="M12,25H6V17h6V15H6a2,2,0,0,0-2,2v8a2,2,0,0,0,2,2h6Z"></path><polygon points="30 20 16.828 20 19.414 17.414 18 16 13 21 18 26 19.414 24.586 16.828 22 30 22 30 20"></polygon><path d="M11,6v5H6V6h5m0-2H6A2,2,0,0,0,4,6v5a2,2,0,0,0,2,2h5a2,2,0,0,0,2-2V6a2,2,0,0,0-2-2Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
