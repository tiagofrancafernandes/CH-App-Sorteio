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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>share-knowledge</title><path d="M27,25H21a3,3,0,0,0-3,3v2h2V28a1,1,0,0,1,1-1h6a1,1,0,0,1,1,1v2h2V28A3,3,0,0,0,27,25Z" transform="translate(0 0)"></path><path d="M20,20a4,4,0,1,0,4-4A4,4,0,0,0,20,20Zm6,0a2,2,0,1,1-2-2A2,2,0,0,1,26,20Z" transform="translate(0 0)"></path><path d="M6,21V20H4v1a7,7,0,0,0,7,7h3V26H11A5,5,0,0,1,6,21Z" transform="translate(0 0)"></path><rect x="19" y="10" width="7" height="2"></rect><rect x="19" y="6" width="10" height="2"></rect><rect x="19" y="2" width="10" height="2"></rect><path d="M11,11H5a3,3,0,0,0-3,3v2H4V14a1,1,0,0,1,1-1h6a1,1,0,0,1,1,1v2h2V14A3,3,0,0,0,11,11Z" transform="translate(0 0)"></path><path d="M8,10A4,4,0,1,0,4,6,4,4,0,0,0,8,10ZM8,4A2,2,0,1,1,6,6,2,2,0,0,1,8,4Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
