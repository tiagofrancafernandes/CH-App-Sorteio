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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="25" cy="20" r="1"></circle><path d="M19.4141,30H15V25.5857l5.0337-5.0337A4.6069,4.6069,0,0,1,20,20a5,5,0,1,1,4.4478,4.9663ZM17,28h1.5859l5.2061-5.2063.5395.1238a3.0351,3.0351,0,1,0-2.249-2.2488l.1236.5393L17,26.4143Z" transform="translate(0 0)"></path><rect x="6" y="8" width="2" height="8"></rect><rect x="2" y="8" width="2" height="8"></rect><rect x="18" y="8" width="2" height="6"></rect><path d="M14,16H12a2,2,0,0,1-2-2V10a2,2,0,0,1,2-2h2a2,2,0,0,1,2,2v4A2,2,0,0,1,14,16Zm-2-2h2V10H12Z" transform="translate(0 0)"></path><rect x="2" y="18" width="2" height="8"></rect><rect x="14" y="18" width="2" height="4"></rect><path d="M10,26H8a2,2,0,0,1-2-2V20a2,2,0,0,1,2-2h2a2,2,0,0,1,2,2v4A2,2,0,0,1,10,26ZM8,24h2V20H8Z" transform="translate(0 0)"></path><rect x="2" y="2" width="2" height="4"></rect><rect x="14" y="2" width="2" height="4"></rect><rect x="18" y="2" width="2" height="4"></rect><path d="M10,6H8A2,2,0,0,1,6,4V2H8V4h2V2h2V4A2,2,0,0,1,10,6Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
