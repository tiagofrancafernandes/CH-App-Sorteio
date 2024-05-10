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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>distribute--horizontal-center</title><path d="M24,10H23V2H21v8H20a2.0023,2.0023,0,0,0-2,2v8a2.0023,2.0023,0,0,0,2,2h1v8h2V22h1a2.0023,2.0023,0,0,0,2-2V12A2.0023,2.0023,0,0,0,24,10Zm0,10H20V12h4Z"></path><path d="M12,6H11V2H9V6H8A2.0023,2.0023,0,0,0,6,8V24a2.0023,2.0023,0,0,0,2,2H9v4h2V26h1a2.0023,2.0023,0,0,0,2-2V8A2.0023,2.0023,0,0,0,12,6Zm0,18H8V8h4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
