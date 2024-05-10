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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="15" y="8" width="2" height="6"></rect><rect x="15" y="18" width="2" height="6"></rect><rect x="18" y="15" width="6" height="2"></rect><rect x="8" y="15" width="6" height="2"></rect><path d="M4,10H2V4A2.0021,2.0021,0,0,1,4,2h6V4H4Z"></path><path d="M10,30H4a2.0021,2.0021,0,0,1-2-2V22H4v6h6Z"></path><path d="M28,30H22V28h6V22h2v6A2.0021,2.0021,0,0,1,28,30Z"></path><path d="M30,10H28V4H22V2h6a2.0021,2.0021,0,0,1,2,2Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
