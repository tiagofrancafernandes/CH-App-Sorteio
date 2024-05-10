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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon" class="heroicons" :class="`w-${computedSize} h-${computedSize}`">
  <path fill-rule="evenodd" d="M5 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H5Zm.75 6a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5ZM5 3.75A.75.75 0 0 1 5.75 3h4.5a.75.75 0 0 1 0 1.5h-4.5A.75.75 0 0 1 5 3.75Zm.75 7.75a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5ZM5 10a.75.75 0 1 1 1.5 0A.75.75 0 0 1 5 10Zm5.25-3a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5Zm-.75 3a.75.75 0 0 1 1.5 0v2.25a.75.75 0 0 1-1.5 0V10ZM8 7a.75.75 0 1 0 0 1.5A.75.75 0 0 0 8 7Zm-.75 5.25a.75.75 0 1 1 1.5 0 .75.75 0 0 1-1.5 0Zm.75-3a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5Z" clip-rule="evenodd"></path>
</svg>

</template>
