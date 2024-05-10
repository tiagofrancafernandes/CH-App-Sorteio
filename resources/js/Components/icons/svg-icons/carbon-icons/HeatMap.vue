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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>heat-map</title><rect x="20" y="18" width="2" height="2"></rect><rect x="28" y="16" width="2" height="2"></rect><rect x="14" y="6" width="2" height="2"></rect><path d="M16,22H12V16a2.0023,2.0023,0,0,0-2-2H4a2.0023,2.0023,0,0,0-2,2v6a2.0023,2.0023,0,0,0,2,2h6v4a2.0023,2.0023,0,0,0,2,2h4a2.0023,2.0023,0,0,0,2-2V24A2.0023,2.0023,0,0,0,16,22ZM4,22V16h6v6Zm8,6V24h4v4Z"></path><path d="M28,30H24a2.0021,2.0021,0,0,1-2-2V24a2.0021,2.0021,0,0,1,2-2h4a2.0021,2.0021,0,0,1,2,2v4A2.0021,2.0021,0,0,1,28,30Zm-4-6v4h4V24Z"></path><path d="M28,2H22a2.0023,2.0023,0,0,0-2,2v6H18a2.0023,2.0023,0,0,0-2,2v2a2.0023,2.0023,0,0,0,2,2h2a2.0023,2.0023,0,0,0,2-2V12h6a2.0023,2.0023,0,0,0,2-2V4A2.0023,2.0023,0,0,0,28,2ZM18,14V12h2v2Zm4-4V4h6v6Z"></path><path d="M8,10H4A2.0021,2.0021,0,0,1,2,8V4A2.0021,2.0021,0,0,1,4,2H8a2.0021,2.0021,0,0,1,2,2V8A2.0021,2.0021,0,0,1,8,10ZM4,4V8H8V4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
