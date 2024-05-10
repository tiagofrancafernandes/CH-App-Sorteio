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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="8" y="8" width="2" height="4"></rect><rect x="8" y="14" width="2" height="4"></rect><rect x="14" y="8" width="2" height="4"></rect><rect x="14" y="14" width="2" height="4"></rect><rect x="8" y="20" width="2" height="4"></rect><rect x="14" y="20" width="2" height="4"></rect><polygon points="30 22 21.83 22 24.41 24.59 23 26 18 21 23 16 24.41 17.41 21.83 20 30 20 30 22"></polygon><polygon points="19 12 27.17 12 24.59 14.59 26 16 31 11 26 6 24.59 7.41 27.17 10 19 10 19 12"></polygon><path d="M28,26v2H4V4H20V6h2V4a2,2,0,0,0-2-2H4A2,2,0,0,0,2,4V30H30V26Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
