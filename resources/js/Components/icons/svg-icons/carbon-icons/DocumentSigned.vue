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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M19.4141,30H15V25.5857l5.0337-5.0337A4.6069,4.6069,0,0,1,20,20a5,5,0,1,1,4.4478,4.9663ZM17,28h1.5859l5.2061-5.2063.5395.1238a3.0351,3.0351,0,1,0-2.249-2.2488l.1236.5393L17,26.4143Z" transform="translate(0 0)"></path><circle cx="25" cy="20" r="1"></circle><rect x="8" y="6" width="12" height="2"></rect><rect x="8" y="10" width="12" height="2"></rect><rect x="8" y="14" width="6" height="2"></rect><rect x="8" y="24" width="4" height="2"></rect><path d="M12,30H6a2.0021,2.0021,0,0,1-2-2V4A2.0021,2.0021,0,0,1,6,2H22a2.0021,2.0021,0,0,1,2,2v9H22V4H6V28h6Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
