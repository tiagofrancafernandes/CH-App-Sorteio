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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M17,11H11a3,3,0,0,0-3,3v4h2V14a1,1,0,0,1,1-1h6a1,1,0,0,1,1,1v1h2V14A3,3,0,0,0,17,11Z" transform="translate(0 0)"></path><path d="M10,6a4,4,0,1,0,4-4A4,4,0,0,0,10,6Zm6,0a2,2,0,1,1-2-2A2,2,0,0,1,16,6Z" transform="translate(0 0)"></path><path d="M22,27H16a2.0021,2.0021,0,0,1-2-2V19a2.0021,2.0021,0,0,1,2-2h6a2.0021,2.0021,0,0,1,2,2v6A2.0021,2.0021,0,0,1,22,27Zm-6-8v6h6V19Z" transform="translate(0 0)"></path><path d="M8,30H4a2.0021,2.0021,0,0,1-2-2V4A2.0021,2.0021,0,0,1,4,2H8V4H4V28H8Z" transform="translate(0 0)"></path><path d="M28,30H24V28h4V4H24V2h4a2.0021,2.0021,0,0,1,2,2V28A2.0021,2.0021,0,0,1,28,30Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
