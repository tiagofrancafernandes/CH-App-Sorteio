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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>4K</title><polygon points="12 11.03 12 15.03 10 15.03 10 11.03 8 11.03 8 17.03 12 17.03 12 21.03 14 21.03 14 11.03 12 11.03"></polygon><polygon points="24.19 11.03 22 11.03 19 15.42 19 11.03 17 11.03 17 21.03 19 21.03 19 18.3 19.91 16.97 22 21.03 24.19 21.03 21.2 15.41 24.19 11.03"></polygon><path d="M28,26H4a2,2,0,0,1-2-2V8A2,2,0,0,1,4,6H28a2,2,0,0,1,2,2V24A2,2,0,0,1,28,26ZM4,8V24H28V8Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
