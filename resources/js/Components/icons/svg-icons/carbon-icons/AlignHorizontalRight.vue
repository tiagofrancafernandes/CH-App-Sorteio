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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>align--horizontal-right</title><path d="M4,24V20a2.0023,2.0023,0,0,1,2-2H21a2.0023,2.0023,0,0,1,2,2v4a2.0023,2.0023,0,0,1-2,2H6A2.0023,2.0023,0,0,1,4,24Zm2,0H21V20L6,19.9988Z" transform="translate(0 0)"></path><path d="M12,12V8a2.0023,2.0023,0,0,1,2-2h7a2.0023,2.0023,0,0,1,2,2v4a2.0023,2.0023,0,0,1-2,2H14A2.0023,2.0023,0,0,1,12,12Zm2,0h7V8l-7-.0012Z" transform="translate(0 0)"></path><rect x="26" y="2" width="2" height="28" transform="translate(54 32) rotate(-180)"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" transform="translate(32 32) rotate(-180)" style="fill:none"></rect></svg>

</template>
