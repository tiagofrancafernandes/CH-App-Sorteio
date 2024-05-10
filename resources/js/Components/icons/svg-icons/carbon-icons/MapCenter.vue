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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="23" y="26" width="2" height="4"></rect><rect x="23" y="18" width="2" height="4"></rect><rect x="26" y="23" width="4" height="2"></rect><rect x="18" y="23" width="4" height="2"></rect><path d="M25.3418,10.06l-22-8A1,1,0,0,0,2.06,3.3415l8,22A1.0011,1.0011,0,0,0,10.9839,26H11a1,1,0,0,0,.9287-.6289L15.77,15.7692l9.6015-3.8408a1,1,0,0,0-.0293-1.8687ZM14.6284,14.0709v0l-.3979.1591-.1591.3979,0,0-3.0268,7.5678L4.6719,4.6715l17.5244,6.3726Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
