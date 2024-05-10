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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="27 25.586 25 23.586 25 21 23 21 23 24.414 25.586 27 27 25.586"></polygon><path d="M24,31a7,7,0,1,1,7-7A7.0078,7.0078,0,0,1,24,31Zm0-12a5,5,0,1,0,5,5A5.0055,5.0055,0,0,0,24,19Z"></path><path d="M16,28A12.0134,12.0134,0,0,1,4,16H2A14.0158,14.0158,0,0,0,16,30Z"></path><path d="M12,8H7.0784A11.9843,11.9843,0,0,1,28,16h2A13.9778,13.9778,0,0,0,6,6.2344V2H4v8h8Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
