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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M31,25a6,6,0,1,0-6,6A6.0066,6.0066,0,0,0,31,25Zm-2,0a3.9521,3.9521,0,0,1-.5669,2.019L22.981,21.5669A3.9529,3.9529,0,0,1,25,21,4.0045,4.0045,0,0,1,29,25Zm-8,0a3.9521,3.9521,0,0,1,.5669-2.019l5.4521,5.4521A3.9529,3.9529,0,0,1,25,29,4.0045,4.0045,0,0,1,21,25Z"></path><polygon points="19.59 16 17 18.59 18.42 20 22.42 16 18.42 12 17 13.41 19.59 16"></polygon><polygon points="10.41 16 13 13.41 11.58 12 7.58 16 11.58 20 13 18.59 10.41 16"></polygon><path d="M4,9H26v7h2V4a2,2,0,0,0-2-2H4A2,2,0,0,0,2,4V24a2,2,0,0,0,2,2H16V24H4ZM4,4H26V7H4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
