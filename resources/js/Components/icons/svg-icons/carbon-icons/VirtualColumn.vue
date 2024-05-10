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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>virtual-column</title><polygon points="25 11 26.414 12.414 23.828 15 30 15 30 17 23.828 17 26.414 19.586 25 21 20 16 25 11"></polygon><path d="M30,28H20a2.0023,2.0023,0,0,1-2-2V6a2.0023,2.0023,0,0,1,2-2H30V6H20V26H30Z"></path><path d="M12,28H2V26H12V6H2V4H12a2.0023,2.0023,0,0,1,2,2V26A2.0023,2.0023,0,0,1,12,28Z"></path><polygon points="7 11 5.586 12.414 8.172 15 2 15 2 17 8.172 17 5.586 19.586 7 21 12 16 7 11"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
