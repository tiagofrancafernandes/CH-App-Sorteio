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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M19,26H14V24h5a5.0055,5.0055,0,0,0,5-5V14h2v5A7.0078,7.0078,0,0,1,19,26Z"></path><path d="M8,30H4a2.0023,2.0023,0,0,1-2-2V14a2.0023,2.0023,0,0,1,2-2H8a2.0023,2.0023,0,0,1,2,2V28A2.0023,2.0023,0,0,1,8,30ZM4,14V28H8V14Z"></path><path d="M28,10H14a2.0023,2.0023,0,0,1-2-2V4a2.0023,2.0023,0,0,1,2-2H28a2.0023,2.0023,0,0,1,2,2V8A2.0023,2.0023,0,0,1,28,10ZM14,4V8H28V4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
