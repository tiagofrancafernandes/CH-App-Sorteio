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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,6H4A2.0023,2.0023,0,0,0,2,8V24a2.0023,2.0023,0,0,0,2,2H28a2.0023,2.0023,0,0,0,2-2V8A2.0023,2.0023,0,0,0,28,6ZM20,24H12V22a1,1,0,0,1,1-1h6a1,1,0,0,1,1,1Zm8,0H22V22a3,3,0,0,0-3-3H13a3,3,0,0,0-3,3v2H4V8H28Z"></path><path d="M16,18a4,4,0,1,0-4-4A4,4,0,0,0,16,18Zm0-6a2,2,0,1,1-2,2A2,2,0,0,1,16,12Z"></path><rect id="_Transparent_Rectangle_" data-name=" Transparent Rectangle " class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
