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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>hospital</title><polygon points="21 10 17 10 17 6 15 6 15 10 11 10 11 12 15 12 15 16 17 16 17 12 21 12 21 10"></polygon><path d="M28,10H26V4a2.0023,2.0023,0,0,0-2-2H8A2.0023,2.0023,0,0,0,6,4v6H4a2.0023,2.0023,0,0,0-2,2V30H30V12A2.0023,2.0023,0,0,0,28,10ZM14,28V22h4v6Zm6,0V21a1,1,0,0,0-1-1H13a1,1,0,0,0-1,1v7H4V12H8V4H24v8h4V28Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
