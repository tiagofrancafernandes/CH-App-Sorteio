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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-1" d="M28,20V17a4,4,0,0,0-8,0v3a2.0023,2.0023,0,0,0-2,2v6a2.0023,2.0023,0,0,0,2,2h8a2.0023,2.0023,0,0,0,2-2V22A2.0023,2.0023,0,0,0,28,20Zm-6-3a2,2,0,0,1,4,0v3H22Zm6,11H20V22h8Z" transform="translate(0 0)" style="fill:currentColor"></path><path class="cls-1" d="M15,27H4a2,2,0,0,1-2-2V22a2,2,0,0,1,2-2H15v2H4v3H15Z" transform="translate(0 0)" style="fill:currentColor"></path><path class="cls-1" d="M17,18H8a2,2,0,0,1-2-2V13a2,2,0,0,1,2-2H19v2H8v3h9Z" transform="translate(0 0)" style="fill:currentColor"></path><path class="cls-1" d="M22,9H4A2,2,0,0,1,2,7V4A2,2,0,0,1,4,2H22a2,2,0,0,1,2,2V7A2,2,0,0,1,22,9ZM4,7H22V4H4Z" transform="translate(0 0)" style="fill:currentColor"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill: none"></rect></svg>

</template>
