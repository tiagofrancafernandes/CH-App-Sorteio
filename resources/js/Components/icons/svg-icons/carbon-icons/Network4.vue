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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>network--4</title><circle cx="21" cy="26" r="2"></circle><circle cx="21" cy="6" r="2"></circle><circle cx="4" cy="16" r="2"></circle><path d="M28,12a3.9962,3.9962,0,0,0-3.8579,3H19.8579a3.9655,3.9655,0,0,0-5.4914-2.6426L11.19,8.3872A3.9626,3.9626,0,0,0,12,6a4,4,0,1,0-4,4,3.96,3.96,0,0,0,1.6338-.3574l3.176,3.97a3.9239,3.9239,0,0,0,0,4.7744l-3.1758,3.97A3.96,3.96,0,0,0,8,22a4,4,0,1,0,4,4,3.9624,3.9624,0,0,0-.81-2.3872l3.1758-3.97A3.9658,3.9658,0,0,0,19.8579,17h4.2842A3.9934,3.9934,0,1,0,28,12ZM6,6A2,2,0,1,1,8,8,2.0023,2.0023,0,0,1,6,6ZM8,28a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,8,28Zm8-10a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,16,18Zm12,0a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,28,18Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" transform="translate(32 32) rotate(180)" style="fill:none"></rect></svg>

</template>
