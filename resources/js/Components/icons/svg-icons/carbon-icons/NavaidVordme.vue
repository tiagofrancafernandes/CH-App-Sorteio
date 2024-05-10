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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="16" cy="16" r="2"></circle><path class="cls-1" d="M30,6a2.0023,2.0023,0,0,0-2-2H4A2.0023,2.0023,0,0,0,2,6V26a2.0023,2.0023,0,0,0,2,2H28a2.0023,2.0023,0,0,0,2-2Zm-2,6.9258L22.9636,6H28ZM27.7637,16,20.491,26H11.509L4.2363,16,11.509,6h8.982ZM9.0364,6,4,12.9248V6ZM4,19.0752,9.0364,26H4ZM22.9636,26l5.0374-6.9263L28,26Z" transform="translate(0 0)" style="fill:currentColor"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" transform="translate(32 32) rotate(-180)" style="fill: none"></rect></svg>

</template>
